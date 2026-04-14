<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherAlert extends Model
{
    protected $fillable = [
        'farmer_id',
        'type',
        'message',
        'severity'
    ];
}
