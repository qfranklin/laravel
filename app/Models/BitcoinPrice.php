<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitcoinPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'max_price',
        'open_price',
        'close_price',
        'high_price',
        'low_price',
        'volume',
    ];

    public static function calculateSMA($window)
    {
        return self::select('date', 'close_price')
            ->orderBy('date')
            ->get()
            ->map(function ($item, $key) use ($window) {
                $item->sma = self::where('date', '<=', $item->date)
                    ->orderBy('date', 'desc')
                    ->take($window)
                    ->avg('close_price');
                return $item;
            });
    }

    public static function getQuarterlyData($year, $startMonth, $endMonth)
    {
        return self::whereYear('date', $year)
            ->whereMonth('date', '>=', $startMonth)
            ->whereMonth('date', '<=', $endMonth)
            ->orderBy('date')
            ->get();
    }

    public static function calculateMovingAverage($date, $days)
    {
        return self::where('date', '<=', $date)
            ->orderBy('date', 'desc')
            ->take($days)
            ->avg('close_price');
    }
}
