<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BitcoinPrice;
use App\Models\EthereumPrice;
use App\Models\MoneroPrice;
use App\Models\SolanaPrice;
use Carbon\Carbon;

class CryptoPriceController extends Controller
{
    protected $models = [
        'bitcoin' => BitcoinPrice::class,
        'ethereum' => EthereumPrice::class,
        'monero' => MoneroPrice::class,
        'solana' => SolanaPrice::class,
    ];

    public function getPrices(Request $request)
    {
        $validatedData = $request->validate([
            'crypto' => 'required|string|in:bitcoin,ethereum,monero,solana',
            'range' => 'required|string|in:hourly,7d,30d',
        ]);

        $crypto = $validatedData['crypto'];
        $range = $validatedData['range'];

        $model = $this->models[$crypto];
        $endTime = Carbon::now('UTC');

        switch ($range) {
            case 'hourly':
                $startTime = $endTime->copy()->subHours(24);
                $additionalTime = $startTime->copy()->subHours(50);
                $prices = $model::where('timestamp', '>=', $additionalTime)
                    ->where('timestamp', '<=', $endTime)
                    ->orderBy('timestamp')
                    ->get();
                $period = 24;
                break;

            case '7d':
                $startTime = $endTime->copy()->subDays(7);
                $additionalTime = $startTime->copy()->subDays(50);
                $prices = $model::where('timestamp', '>=', $additionalTime)
                    ->where('timestamp', '<=', $endTime)
                    ->whereRaw('HOUR(timestamp) = 0')
                    ->orderBy('timestamp')
                    ->get();
                $period = 7;
                break;

            case '30d':
                $startTime = $endTime->copy()->subDays(30);
                $additionalTime = $startTime->copy()->subDays(50);
                $prices = $model::where('timestamp', '>=', $additionalTime)
                    ->where('timestamp', '<=', $endTime)
                    ->whereRaw('HOUR(timestamp) = 0')
                    ->orderBy('timestamp')
                    ->get();
                $period = 30;
                break;
        }

        // Filter the prices to only include the requested time range
        $filteredPrices = $prices->filter(function ($price) use ($startTime, $endTime) {
            $time = Carbon::parse($price->timestamp, 'UTC');
            return $time->between($startTime, $endTime);
        });

        // Extract high prices for moving average calculations
        $highPrices = $prices->pluck('high_24h')->map(fn($price) => (float) $price)->toArray();

        // Extract closing prices for RSI calculations
        $closingPrices = $prices->pluck('current_price')->map(fn($price) => (float) $price)->toArray();

        // Calculate moving averages
        $ma10 = $this->calculateMovingAverage($highPrices, $period);
        $ma50 = $this->calculateMovingAverage($highPrices, $period);

        // Calculate RSI
        $rsi = $this->calculateRSI($closingPrices, $period);

        // Add moving averages and RSI to each price record
        $filteredPrices->each(function ($price, $index) use ($ma10, $ma50, $rsi) {
            $price->ma10 = $ma10[$index] ?? null;
            $price->ma50 = $ma50[$index] ?? null;
            $price->rsi = $rsi[$index] ?? null;
        });

        return response()->json($filteredPrices->values());
    }

    private function calculateMovingAverage(array $prices, int $period)
    {
        $movingAverage = [];
        $sum = 0;

        foreach ($prices as $i => $price) {
            $sum += $price;

            // Start calculating the MA only when we have enough data points
            if ($i >= $period - 1) {
                $movingAverage[$i] = $sum / $period;

                // Subtract the price that's sliding out of the window
                $sum -= $prices[$i - $period + 1];
            } else {
                $movingAverage[$i] = null; // Not enough data for MA
            }
        }

        return $movingAverage;
    }

    private function calculateRSI(array $prices, int $period)
    {
        $rsi = [];
        $gains = 0;
        $losses = 0;
        $averageGain = 0;
        $averageLoss = 0;

        foreach ($prices as $i => $price) {
            if ($i == 0) {
                $rsi[] = null; // No previous price to compare with
                continue;
            }

            $change = $prices[$i] - $prices[$i - 1];
            $gain = max(0, $change);
            $loss = max(0, -$change);

            if ($i <= $period) {
                $gains += $gain;
                $losses += $loss;
                if ($i == $period) {
                    $averageGain = $gains / $period;
                    $averageLoss = $losses / $period;
                    $rs = $averageGain / $averageLoss;
                    $rsi[] = 100 - (100 / (1 + $rs));
                } else {
                    $rsi[] = null; // Not enough data to calculate RSI
                }
            } else {
                $averageGain = (($averageGain * ($period - 1)) + $gain) / $period;
                $averageLoss = (($averageLoss * ($period - 1)) + $loss) / $period;
                if ($averageLoss == 0) {
                    $rsi[] = 100;
                } else {
                    $rs = $averageGain / $averageLoss;
                    $rsi[] = 100 - (100 / (1 + $rs));
                }
            }
        }

        return $rsi;
    }
}
