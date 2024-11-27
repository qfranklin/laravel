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
}
