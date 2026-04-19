<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = [
        'market_name',
        'region',
        'crop',
        'demand_level',
        'price',
        'recorded_at'
    ];
}
