<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BitcoinPrice;

class BitcoinPriceController extends Controller
{
    public function getSMA($window)
    {
        $smaData = BitcoinPrice::calculateSMA($window);
        return response()->json($smaData);
    }
}
