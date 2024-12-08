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
    protected $description = 'Fetch and store hourly price data for multiple cryptocurrencies';

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
        $cryptoIds = implode(',', array_keys($this->cryptos));
        $url = "https://api.coingecko.com/api/v3/coins/markets";
        $params = [
            'vs_currency' => 'usd',
            'ids' => $cryptoIds,
        ];

        $response = Http::get($url, $params);

        if ($response->successful()) {
            $data = $response->json();

            foreach ($data as $cryptoData) {
                $model = $this->cryptos[$cryptoData['id']];
                $timestamp = Carbon::now()->roundHour()->setTimezone('UTC')->toDateTimeString();

                $model::updateOrCreate(
                    ['timestamp' => $timestamp],
                    [
                        'current_price' => $cryptoData['current_price'],
                        'high_24h' => $cryptoData['high_24h'],
                        'low_24h' => $cryptoData['low_24h'],
                        'market_cap' => $cryptoData['market_cap'],
                        'total_volume' => $cryptoData['total_volume'],
                        'circulating_supply' => $cryptoData['circulating_supply'],
                        'max_supply' => $cryptoData['max_supply'],
                        'sentiment_votes_up_percentage' => $cryptoData['sentiment_votes_up_percentage'] ?? null,
                        'sentiment_votes_down_percentage' => $cryptoData['sentiment_votes_down_percentage'] ?? null,
                    ]
                );
            }
        } else {
            $this->error('Failed to fetch crypto prices. Status: ' . $response->status());
        }
    }
}
