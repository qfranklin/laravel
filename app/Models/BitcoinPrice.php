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
        'timestamp',
        'current_price',
        'high_24h',
        'low_24h',
        'market_cap',
        'total_volume',
        'circulating_supply',
        'max_supply',
        'sentiment_votes_up_percentage',
        'sentiment_votes_down_percentage'
    ];
}
