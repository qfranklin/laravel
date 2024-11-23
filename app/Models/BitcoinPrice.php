<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class BitcoinPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'max_price',
    ];

    public static function calculateSMA($window)
    {
        return self::select('date', 'max_price')
            ->orderBy('date')
            ->get()
            ->map(function ($item, $key) use ($window) {
                $item->sma = self::where('date', '<=', $item->date)
                    ->orderBy('date', 'desc')
                    ->take($window)
                    ->avg('max_price');
                return $item;
            });
    }
}
