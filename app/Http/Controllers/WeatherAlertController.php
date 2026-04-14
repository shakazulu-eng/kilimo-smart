<?php

namespace App\Http\Controllers;

use App\Models\WeatherAlert;
use Illuminate\Support\Facades\Http;

class WeatherAlertController extends Controller
{
   public function checkWeather()
{
    $apiKey = "e3936a940a82dbbe2844382b5cc20256"; // <-- weka key yako
    $city = "Dar es Salaam";

    $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
        'q' => $city,
        'appid' => $apiKey,
        'units' => 'metric'
    ]);

    // Check if request was successful
    if (!$response->successful()) {
        return "Error fetching weather: " . $response->body();
    }

    $data = $response->json();

    // Safeguard against missing keys
    if (!isset($data['main'])) {
        return "Weather data not found in API response: " . json_encode($data);
    }

    $temp = $data['main']['temp'];
    $wind = $data['wind']['speed'] ?? 0;
    $rain = $data['rain']['1h'] ?? 0;

    if ($rain > 20) {
        \App\Models\WeatherAlert::create([
            'farmer_id' => 1,
            'type' => 'rain',
            'message' => 'Mvua kubwa inatarajiwa, linda mazao yako',
            'severity' => 'high'
        ]);
    }

    if ($temp > 35) {
        \App\Models\WeatherAlert::create([
            'farmer_id' => 1,
            'type' => 'heat',
            'message' => 'Joto kali linakuja, zingatia umwagiliaji',
            'severity' => 'medium'
        ]);
    }

    return "Weather alert checked successfully";

}

public function showAlerts()
{
    // Kwa sasa role ni student
    $alerts = \App\Models\WeatherAlert::where('farmer_id', 1)
                ->orderBy('created_at', 'desc')
                ->get();

    return view('student.alerts', compact('alerts'));
}

}
