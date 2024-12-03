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

        // Extract high_24h prices for moving average calculations
        $highPrices = $prices->pluck('high_24h')->map(fn($price) => (float) $price)->toArray();

        // Calculate moving averages
        $ma10 = $this->calculateMovingAverage($highPrices, 10);
        $ma50 = $this->calculateMovingAverage($highPrices, 50);

        // Add moving averages to each price record
        $prices = $prices->map(function ($price, $index) use ($ma10, $ma50) {
            return array_merge($price->toArray(), [
                'ma_10' => $ma10[$index] ?? null,
                'ma_50' => $ma50[$index] ?? null,
            ]);
        });

        // Filter the prices to only include the requested date range
        $filteredPrices = $prices->filter(function ($price) use ($startDate, $endDate) {
            $date = Carbon::parse($price['date']);
            return $date->between($startDate, $endDate);
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
}
