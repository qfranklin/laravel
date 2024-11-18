<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_id',
        'ip_address',
        'user_agent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function analytics()
    {
        return $this->hasMany(UserAnalytics::class);
    }

    public function sessionData()
    {
        return $this->hasMany(SessionData::class);
    }
}
