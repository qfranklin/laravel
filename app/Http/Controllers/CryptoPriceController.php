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

        $prices = $model::whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get();

        return response()->json($prices);
    }
}
