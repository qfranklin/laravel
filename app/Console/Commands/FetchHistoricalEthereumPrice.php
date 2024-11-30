<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EthereumPrice;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class FetchHistoricalEthereumPrice extends Command
{
    protected $signature = 'fetch:historical-ethereum-price {start_date?} {end_date?}';
    protected $description = 'Fetch and store Ethereum daily maximum price data for a specified date range';

    public function handle()
    {
        $startDate = $this->argument('start_date') ? Carbon::parse($this->argument('start_date')) : Carbon::now()->subDay();
        $endDate = $this->argument('end_date') ? Carbon::parse($this->argument('end_date')) : Carbon::now();

        $url = 'https://api.coingecko.com/api/v3/coins/ethereum/market_chart/range';
        $params = [
            'vs_currency' => 'usd',
            'from' => $startDate->timestamp,
            'to' => $endDate->timestamp
        ];

        $response = Http::get($url, $params);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['prices']) && isset($data['market_caps']) && isset($data['total_volumes'])) {
                foreach ($data['prices'] as $index => $priceData) {
                    $date = Carbon::createFromTimestampMs($priceData[0])->toDateString();

                    EthereumPrice::updateOrCreate(
                        ['date' => $date],
                        [
                            'high_24h' => $priceData[1] ?? null,
                            'low_24h' => $priceData[1] ?? null,
                            'market_cap' => $data['market_caps'][$index][1] ?? null,
                            'total_volume' => $data['total_volumes'][$index][1] ?? null
                        ]
                    );
                }

                $this->info('Ethereum daily maximum price data has been updated.');
            } else {
                $this->error('No price data found in the response.');
            }
        } else {
            $this->error('Failed to fetch Ethereum price data. Status: ' . $response->status());
            $this->error('Response: ' . $response->body());
        }
    }
}
