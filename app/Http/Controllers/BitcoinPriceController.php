<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BitcoinPrice;
use Carbon\Carbon;

class BitcoinPriceController extends Controller
{
    public function getSMA(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $startDate = Carbon::parse($validatedData['start_date']);
        $endDate = Carbon::parse($validatedData['end_date']);

        $smaData = BitcoinPrice::whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                $item->sma_50 = BitcoinPrice::calculateMovingAverage($item->date, 50);
                $item->sma_200 = BitcoinPrice::calculateMovingAverage($item->date, 200);
                return $item;
            });

        return response()->json($smaData);
    }

    public function getQuarterlyData($year, $quarter)
    {
        $startMonth = ($quarter - 1) * 3 + 1;
        $endMonth = $startMonth + 2;

        $data = BitcoinPrice::getQuarterlyData($year, $startMonth, $endMonth);
        $data->each(function ($item) {
            $item->sma_50 = BitcoinPrice::calculateMovingAverage($item->date, 50);
            $item->sma_200 = BitcoinPrice::calculateMovingAverage($item->date, 200);
        });
        return response()->json($data);
    }

    public function getQuarterlyMaxPrice($year, $quarter)
    {
        $startMonth = ($quarter - 1) * 3 + 1;
        $endMonth = $startMonth + 2;

        $data = BitcoinPrice::whereYear('date', $year)
            ->whereMonth('date', '>=', $startMonth)
            ->whereMonth('date', '<=', $endMonth)
            ->orderBy('date')
            ->get(['date', 'max_price']);

        $data->each(function ($item) {
            $item->sma_50 = BitcoinPrice::calculateMovingAverage($item->date, 50);
            $item->sma_200 = BitcoinPrice::calculateMovingAverage($item->date, 200);
        });

        return response()->json($data);
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

    public function getAvailableQuarters()
    {
        $minDate = BitcoinPrice::min('date');
        $maxDate = BitcoinPrice::max('date');

        $minYear = Carbon::parse($minDate)->year;
        $maxYear = Carbon::parse($maxDate)->year;

        $minQuarter = Carbon::parse($minDate)->quarter;
        $maxQuarter = Carbon::parse($maxDate)->quarter;

        return response()->json([
            'minYear' => $minYear,
            'maxYear' => $maxYear,
            'minQuarter' => $minQuarter,
            'maxQuarter' => $maxQuarter,
        ]);
    }
}
