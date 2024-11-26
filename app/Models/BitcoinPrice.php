<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public static function calculateSMA($date, $window)
    {
        return self::where('date', '<=', $date)
            ->orderBy('date', 'desc')
            ->take($window)
            ->avg('close_price');
    }

    public static function getSMAData($startDate, $endDate)
    {
        return self::whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                $item->sma_50 = self::calculateSMA($item->date, 50);
                $item->sma_200 = self::calculateSMA($item->date, 200);
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
