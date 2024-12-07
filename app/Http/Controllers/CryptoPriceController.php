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
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'crypto' => 'required|string|in:bitcoin,ethereum,monero,solana',
        ]);

        $startDate = Carbon::parse($validatedData['start_date']);
        $endDate = Carbon::parse($validatedData['end_date']);
        $crypto = $validatedData['crypto'];

        $model = $this->models[$crypto];

        // Fetch the past 50 days of data based on the start date
        $thresholdDate = $startDate->copy()->subDays(50);
        $prices = $model::where('date', '>=', $thresholdDate)
            ->where('date', '<=', $endDate)
            ->orderBy('date')
            ->get();

        // Extract closing prices for RSI calculations
        $closingPrices = $prices->pluck('current_price')->map(fn($price) => (float) $price)->toArray();

        // Calculate RSI
        $rsi = $this->calculateRSI($closingPrices, 14);

        // Add RSI to each price record
        $prices = $prices->map(function ($price, $index) use ($rsi) {
            return array_merge($price->toArray(), [
                'rsi' => $rsi[$index] ?? null,
            ]);
        });

        // Filter the prices to only include the requested date range
        $filteredPrices = $prices->filter(function ($price) use ($startDate, $endDate) {
            $date = Carbon::parse($price['date']);
            return $date->between($startDate, $endDate);
        });

        return response()->json($filteredPrices->values());
    }

    /**
     * Calculate the RSI (Relative Strength Index).
     *
     * @param array $prices
     * @param int $period
     * @return array
     */
    protected function calculateRSI(array $prices, int $period): array
    {
        $rsi = [];
        $gains = 0;
        $losses = 0;

        for ($i = 1; $i < count($prices); $i++) {
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
}
