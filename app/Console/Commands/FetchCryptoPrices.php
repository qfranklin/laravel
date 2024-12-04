<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\BitcoinPrice;
use App\Models\EthereumPrice;
use App\Models\MoneroPrice;
use App\Models\SolanaPrice;

class FetchCryptoPrices extends Command
{
    protected $signature = 'fetch:crypto-prices';
    protected $description = 'Fetch and store daily price data for multiple cryptocurrencies';

    // Map cryptos to their respective models
    protected $cryptos = [
        'bitcoin' => BitcoinPrice::class,
        'ethereum' => EthereumPrice::class,
        'monero' => MoneroPrice::class,
        'solana' => SolanaPrice::class,
    ];

    public function handle()
    {
        $this->fetchAndStoreCryptoData();
        $this->info('Crypto prices have been updated.');
    }

    protected function fetchAndStoreCryptoData()
    {
        $url = 'https://api.coingecko.com/api/v3/coins/markets';
        $response = Http::get($url, [
            'vs_currency' => 'usd',
            'ids' => implode(',', array_keys($this->cryptos)),
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Map the API response to their respective models
            foreach ($data as $crypto) {
                if (isset($this->cryptos[$crypto['id']])) {
                    $this->updateCryptoTable($crypto, $this->cryptos[$crypto['id']]);
                }
            }

            $this->info('Data has been updated for all cryptocurrencies.');
        } else {
            $this->error('Failed to fetch data. Status: ' . $response->status());
        }
    }

    protected function updateCryptoTable(array $crypto, $model)
    {
        $model::updateOrCreate(
            ['date' => Carbon::now()->toDateString()],
            [
                'high_24h' => $crypto['high_24h'] ?? null,
                'low_24h' => $crypto['low_24h'] ?? null,
                'market_cap' => $crypto['market_cap'] ?? null,
                'total_volume' => $crypto['total_volume'] ?? null,
                'circulating_supply' => $crypto['circulating_supply'] ?? null,
                'max_supply' => $crypto['max_supply'] ?? null,
                'price_change_24h' => $crypto['price_change_24h'] ?? null,
                'price_change_percentage_24h' => $crypto['price_change_percentage_24h'] ?? null,
            ]
        );
    }
}
