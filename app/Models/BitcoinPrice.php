<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public static function calculateMovingAverage($date, $days)
    {
        $subQuery = self::select('close_price')
            ->where('date', '<=', $date)
            ->orderBy('date', 'desc')
            ->take($days);

        $average = DB::table(DB::raw("({$subQuery->toSql()}) as recent_prices"))
            ->mergeBindings($subQuery->getQuery())
            ->avg('close_price');

        return $average;
    }
}
