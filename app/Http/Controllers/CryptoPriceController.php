<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BitcoinPrice;
use App\Models\EthereumPrice;
use App\Models\MoneroPrice;
use App\Models\SolanaPrice;
use App\Models\PaxgPrice;
use Carbon\Carbon;

class CryptoPriceController extends Controller
{
    protected $models = [
        'bitcoin' => BitcoinPrice::class,
        'ethereum' => EthereumPrice::class,
        'monero' => MoneroPrice::class,
        'solana' => SolanaPrice::class,
        'paxg' => PaxgPrice::class,
    ];

    public function getPrices(Request $request)
    {
        $validatedData = $request->validate([
            'crypto' => 'required|string|in:bitcoin,ethereum,monero,solana,paxg',
            'range' => 'required|string|in:24h,7d,30d,Max',
        ]);

        $crypto = $validatedData['crypto'];
        $range = $validatedData['range'];

        $model = $this->models[$crypto];
        $endTime = Carbon::now('UTC');

        switch ($range) {
            case '24h':
                $startTime = $endTime->copy()->subHours(25);
                $additionalTime = $startTime->copy()->subHours(51);
                $prices = $model::where('timestamp', '>=', $additionalTime)
                    ->where('timestamp', '<=', $endTime)
                    ->orderBy('timestamp')
                    ->get();
                $period = 24;
                break;

            case '7d':
                $startTime = $endTime->copy()->subDays(8);
                $additionalTime = $startTime->copy()->subDays(51);
                $prices = $model::where('timestamp', '>=', $additionalTime)
                    ->where('timestamp', '<=', $endTime)
                    ->whereRaw("DATE_FORMAT(timestamp, '%H:%i:%s') = '00:00:00'")
                    ->orderBy('timestamp')
                    ->get();
                $period = 7;
                break;

            case '30d':
                $startTime = $endTime->copy()->subDays(31);
                $additionalTime = $startTime->copy()->subDays(51);
                $prices = $model::where('timestamp', '>=', $additionalTime)
                    ->where('timestamp', '<=', $endTime)
                    ->whereRaw("DATE_FORMAT(timestamp, '%H:%i:%s') = '00:00:00'")
                    ->orderBy('timestamp')
                    ->get();
                $period = 30;
                break;

                case 'Max':
                    $startTime = Carbon::parse('2011-01-01 00:00:00', 'UTC');

                    $halvingDates = [
                        '2012-11-28 00:00:00',
                        '2016-07-09 00:00:00',
                        '2020-05-11 00:00:00',
                        '2024-04-20 00:00:00'
                    ];

                    $prices = $model::whereRaw("DAYOFWEEK(timestamp) = 7")
                        ->orWhereIn('timestamp', $halvingDates)
                        ->orderBy('timestamp')
                        ->get();

                    $period = 7;

                    break;
        }

        // Remove duplicates by timestamp
        $uniquePrices = $prices->unique('timestamp');

        // Filter the prices to only include the requested time range
        $filteredPrices = $uniquePrices->filter(function ($price) use ($startTime, $endTime) {
            $time = Carbon::parse($price->timestamp, 'UTC');
            return $time->between($startTime, $endTime);
        });

        // Extract high prices for moving average calculations
        $highPrices = $prices->pluck('high_24h')->map(fn($price) => (float) $price)->toArray();

        // Extract closing prices for RSI calculations
        $closingPrices = $prices->pluck('current_price')->map(fn($price) => (float) $price)->toArray();

        // Calculate moving averages
        $ma10 = $this->calculateMovingAverage($highPrices, 10);
        $ma50 = $this->calculateMovingAverage($highPrices, 50);

        // Calculate RSI
        $rsi = $this->calculateRSI($closingPrices, $period);

        // Add moving averages and RSI to each price record
        $filteredPrices->each(function ($price, $index) use ($ma10, $ma50, $rsi) {
            $price->timestamp = Carbon::parse($price->timestamp, 'UTC')->setTimezone('America/New_York');
            $price->ma_10 = $ma10[$index] ?? null;
            $price->ma_50 = $ma50[$index] ?? null;
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
