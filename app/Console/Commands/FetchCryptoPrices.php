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

    protected $cryptos = [
        'bitcoin' => BitcoinPrice::class,
        'ethereum' => EthereumPrice::class,
        'monero' => MoneroPrice::class,
        'solana' => SolanaPrice::class,
    ];

    public function handle()
    {
        foreach ($this->cryptos as $cryptoId => $model) {
            $this->fetchAndStoreCryptoData($cryptoId, $model);
        }

        $this->info('Crypto prices have been updated.');
    }

    protected function fetchAndStoreCryptoData($cryptoId, $model)
    {
        $url = "https://api.coingecko.com/api/v3/coins/{$cryptoId}";
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            $marketData = $data['market_data'];

            $model::updateOrCreate(
                ['date' => Carbon::now()->toDateString()],
                [
                    'high_24h' => $marketData['high_24h']['usd'] ?? null,
                    'low_24h' => $marketData['low_24h']['usd'] ?? null,
                    'market_cap' => $marketData['market_cap']['usd'] ?? null,
                    'total_volume' => $marketData['total_volume']['usd'] ?? null,
                    'circulating_supply' => $marketData['circulating_supply'] ?? null,
                    'max_supply' => $marketData['max_supply'] ?? null,
                    'sentiment_votes_up_percentage' => $data['sentiment_votes_up_percentage'] ?? null,
                    'sentiment_votes_down_percentage' => $data['sentiment_votes_down_percentage'] ?? null,
                ]
            );

            $this->info("Data for {$cryptoId} has been updated.");
        } else {
            $this->error("Failed to fetch data for {$cryptoId}. Status: " . $response->status());
        }
    }
}
