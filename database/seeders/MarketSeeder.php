<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Market;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

           Market::create([
        'market_name' => 'Kariakoo',
        'region' => 'Dar es Salaam',
        'crop' => 'Mahindi',
        'demand_level' => 90,
        'price' => 800,
        'recorded_at' => now()
    ]);

    Market::create([
        'market_name' => 'Mwanjelwa',
        'region' => 'Mbeya',
        'crop' => 'Ndizi',
        'demand_level' => 85,
        'price' => 600,
        'recorded_at' => now()
    ]);
        
        //
    }
}
