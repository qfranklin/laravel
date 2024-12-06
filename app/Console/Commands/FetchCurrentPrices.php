<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\BitcoinPrice;
use App\Models\EthereumPrice;

class FetchCurrentPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:current-prices';
    protected $description = 'Fetch and update current price and sentiment data for Ethereum and Bitcoin';

    protected $cryptos = [
        'bitcoin' => BitcoinPrice::class,
        'ethereum' => EthereumPrice::class,
    ];

    public function handle()
    {
        foreach ($this->cryptos as $cryptoId => $model) {
            $this->updateCryptoData($cryptoId, $model);
        }

        $this->info('Crypto prices and sentiment data have been updated.');
    }

    protected function updateCryptoData($cryptoId, $model)
    {
        $url = "https://api.coingecko.com/api/v3/coins/{$cryptoId}";
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            $marketData = $data['market_data'];

            $model::updateOrCreate(
                ['date' => Carbon::now()->toDateString()],
                [
                    'current_price' => $marketData['current_price']['usd'] ?? null,
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
