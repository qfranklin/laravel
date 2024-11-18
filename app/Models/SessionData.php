<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionData extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'page_url',
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
