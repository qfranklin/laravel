<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneroPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'high_24h',
        'low_24h',
        'market_cap',
        'total_volume',
        'circulating_supply',
        'sentiment_votes_up_percentage',
        'sentiment_votes_down_percentage'
    ];
}
