<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
   Market::create([
    'market_name' => 'Kariakoo',
    'region' => 'Dar es Salaam',
    'crop' => 'Mahindi',
    'demand_level' => 90,
    'price' => 800,
    'recorded_at' => now()
]);
}
