<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market;
use Carbon\Carbon;

class MarketController extends Controller
{
    //
   public function index()
{
    $currentMonth = Carbon::now()->month;

    $topCrops = Market::select('crop')
        ->selectRaw('AVG(demand_level) as avg_demand')
        ->whereMonth('recorded_at', $currentMonth)
        ->groupBy('crop')
        ->orderByDesc('avg_demand')
        ->take(5)
        ->get();

    $markets = Market::all();

    return view('market', compact('topCrops', 'markets'));
}

}
