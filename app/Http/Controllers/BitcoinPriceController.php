<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BitcoinPrice;
use Carbon\Carbon;

class BitcoinPriceController extends Controller
{
    public function getSMA($window)
    {
        $smaData = BitcoinPrice::calculateSMA($window);
        return response()->json($smaData);
    }

    public function getMonthlyData($year, $month)
    {
        $data = BitcoinPrice::getMonthlyData($year, $month);
        $data->each(function ($item) {
            $item->sma_50 = BitcoinPrice::calculateMovingAverage($item->date, 50);
            $item->sma_200 = BitcoinPrice::calculateMovingAverage($item->date, 200);
        });
        return response()->json($data);
    }

    public function getAvailableMonths()
    {
        $minDate = BitcoinPrice::min('date');
        $maxDate = BitcoinPrice::max('date');

        $minMonth = Carbon::parse($minDate)->format('Y-m');
        $maxMonth = Carbon::parse($maxDate)->format('Y-m');

        return response()->json([
            'minMonth' => $minMonth,
            'maxMonth' => $maxMonth,
        ]);
    }
}
