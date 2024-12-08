<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BitcoinPrice;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class FetchHistoricalBitcoinPrice extends Command
{
    protected $signature = 'fetch:historical-bitcoin-price {start_date?} {end_date?}';
    protected $description = 'Fetch and store Bitcoin historical price data for a specified date range';

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
                $this->storeHistoricalData($data);
                $this->info('Bitcoin historical price data has been updated.');
            } else {
                $this->error('No price data found in the response.');
            }
        } else {
            $this->error('Failed to fetch Bitcoin price data. Status: ' . $response->status());
            $this->error('Response: ' . $response->body());
        }
    }

    /**
     * Stores the historical data in the database.
     *
     * @param array $data
     * @return void
     */
    protected function storeHistoricalData(array $data): void
    {
        $priceDataPoints = [];

        foreach ($data['prices'] as $index => $priceData) {
            $timestamp = Carbon::createFromTimestampMs($priceData[0])->roundHour()->setTimezone('UTC');
            $currentPrice = $priceData[1];
            $marketCap = $data['market_caps'][$index][1] ?? null;
            $totalVolume = $data['total_volumes'][$index][1] ?? null;

            $priceDataPoints[] = [
                'timestamp' => $timestamp,
                'current_price' => $currentPrice,
                'market_cap' => $marketCap,
                'total_volume' => $totalVolume,
            ];
        }

        foreach ($priceDataPoints as $index => $priceData) {
            $timestamp = $priceData['timestamp'];
            $startTime = $timestamp->copy()->subHours(24);

            $high_24h = null;
            $low_24h = null;

            foreach ($priceDataPoints as $dataPoint) {
                if ($dataPoint['timestamp']->between($startTime, $timestamp)) {
                    $high_24h = $high_24h === null ? $dataPoint['current_price'] : max($high_24h, $dataPoint['current_price']);
                    $low_24h = $low_24h === null ? $dataPoint['current_price'] : min($low_24h, $dataPoint['current_price']);
                }
            }

            BitcoinPrice::updateOrCreate(
                ['timestamp' => $timestamp->toDateTimeString()],
                [
                    'current_price' => $priceData['current_price'],
                    'high_24h' => $high_24h,
                    'low_24h' => $low_24h,
                    'market_cap' => $priceData['market_cap'],
                    'total_volume' => $priceData['total_volume'],
                ]
            );
        }
    }
}
