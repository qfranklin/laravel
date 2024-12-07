<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BitcoinPrice;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class FetchHistoricalBitcoinPrice extends Command
{
    protected $signature = 'fetch:historical-bitcoin-price {start_date?} {end_date?}';
    protected $description = 'Fetch and store Bitcoin daily high and low price data for a specified date range';

    public function handle()
    {
        $startDate = $this->argument('start_date') ? Carbon::parse($this->argument('start_date')) : Carbon::now()->subDay();
        $endDate = $this->argument('end_date') ? Carbon::parse($this->argument('end_date')) : Carbon::now();

        $url = 'https://api.coingecko.com/api/v3/coins/bitcoin/market_chart/range';
        $params = [
            'vs_currency' => 'usd',
            'from' => $startDate->timestamp,
            'to' => $endDate->timestamp,
        ];

        $response = Http::get($url, $params);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['prices'])) {
                $dailyData = $this->aggregateDailyHighLow($data['prices']);
                $this->updateDatabase($dailyData, $data['prices']);
                $this->info('Bitcoin daily price data has been updated.');
            } else {
                $this->error('No price data found in the response.');
            }
        } else {
            $this->error('Failed to fetch Bitcoin price data. Status: ' . $response->status());
            $this->error('Response: ' . $response->body());
        }
    }

    /**
     * Aggregates daily high and low prices.
     *
     * @param array $prices
     * @return array
     */
    protected function aggregateDailyHighLow(array $prices): array
    {
        $dailyData = [];

        foreach ($prices as $priceData) {
            $timestamp = $priceData[0];
            $price = $priceData[1];
            $date = Carbon::createFromTimestampMs($timestamp)->toDateString();

            // Initialize or update daily high/low
            if (!isset($dailyData[$date])) {
                $dailyData[$date] = [
                    'high' => $price,
                    'low' => $price,
                ];
            } else {
                $dailyData[$date]['high'] = max($dailyData[$date]['high'], $price);
                $dailyData[$date]['low'] = min($dailyData[$date]['low'], $price);
            }
        }

        return $dailyData;
    }

    /**
     * Updates the database with aggregated daily data.
     *
     * @param array $dailyData
     * @param array $prices
     * @return void
     */
    protected function updateDatabase(array $dailyData, array $prices): void
    {
        foreach ($dailyData as $date => $data) {
            $currentPrice = $this->getCurrentPriceAt3amEST($prices, $date);

            $existingEntry = BitcoinPrice::where('date', $date)->first();

            $high_24h = $existingEntry ? max($existingEntry->high_24h, $data['high']) : $data['high'];
            $low_24h = $existingEntry ? min($existingEntry->low_24h, $data['low']) : $data['low'];

            BitcoinPrice::updateOrCreate(
                ['date' => $date],
                [
                    'high_24h' => $high_24h,
                    'low_24h' => $low_24h,
                    'current_price' => $currentPrice,
                ]
            );
        }
    }

    /**
     * Get the current price closest to 3am EST.
     *
     * @param array $prices
     * @param string $date
     * @return float|null
     */
    protected function getCurrentPriceAt3amEST(array $prices, string $date): ?float
    {
        $targetTime = Carbon::parse($date, 'America/New_York')->setTime(3, 0)->timestamp * 1000;
        $closestPrice = null;
        $closestTimeDiff = PHP_INT_MAX;

        foreach ($prices as $priceData) {
            $timestamp = $priceData[0];
            $price = $priceData[1];
            $timeDiff = abs($timestamp - $targetTime);

            if ($timeDiff < $closestTimeDiff) {
                $closestTimeDiff = $timeDiff;
                $closestPrice = $price;
            }
        }

        return $closestPrice;
    }
}
