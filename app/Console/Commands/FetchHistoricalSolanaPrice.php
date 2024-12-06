<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SolanaPrice;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class FetchHistoricalSolanaPrice extends Command
{
    protected $signature = 'fetch:historical-solana-price {start_date?} {end_date?}';
    protected $description = 'Fetch and store Solana daily high and low price data for a specified date range';

    public function handle()
    {
        $startDate = $this->argument('start_date') ? Carbon::parse($this->argument('start_date')) : Carbon::now()->subDay();
        $endDate = $this->argument('end_date') ? Carbon::parse($this->argument('end_date')) : Carbon::now();

        $url = 'https://api.coingecko.com/api/v3/coins/solana/market_chart/range';
        $params = [
            'vs_currency' => 'usd',
            'from' => $startDate->timestamp,
            'to' => $endDate->timestamp
        ];

        $response = Http::get($url, $params);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['prices'])) {
                $dailyData = $this->aggregateDailyHighLow($data['prices']);
                $this->updateDatabase($dailyData, $data['prices']);
                $this->info('Solana daily price data has been updated.');
            } else {
                $this->error('No price data found in the response.');
            }
        } else {
            $this->error('Failed to fetch Solana price data. Status: ' . $response->status());
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
            $currentPrice = $this->getCurrentPriceAt5amEST($prices, $date);

            SolanaPrice::updateOrCreate(
                ['date' => $date],
                [
                    'high_24h' => $data['high'],
                    'low_24h' => $data['low'],
                    'current_price' => $currentPrice,
                ]
            );
        }
    }

    /**
     * Get the current price closest to 5am EST.
     *
     * @param array $prices
     * @param string $date
     * @return float|null
     */
    protected function getCurrentPriceAt5amEST(array $prices, string $date): ?float
    {
        $targetTime = Carbon::parse($date, 'America/New_York')->setTime(5, 0)->timestamp * 1000;
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
