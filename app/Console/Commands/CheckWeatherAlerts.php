<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\WeatherAlert;
use Illuminate\Support\Facades\Http;

class CheckWeatherAlerts extends Command
{
    protected $signature = 'weather:check';
    protected $description = 'Check weather and create alerts automatically';

    public function handle()
    {
        $apiKey = 'WEKA_OPENWEATHER_API_KEY_HAPA';
        $city = 'Dar es Salaam';

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric'
        ]);

        if (!$response->successful()) {
            $this->info("Weather API error: " . $response->body());
            return;
        }

        $data = $response->json();
        if (!isset($data['main'])) {
            $this->info("No main data in response: " . json_encode($data));
            return;
        }

        $temp = $data['main']['temp'];
        $rain = $data['rain']['1h'] ?? 0;

        // Create alerts
        if ($rain > 20) {
            WeatherAlert::create([
                'farmer_id' => 1,
                'type' => 'rain',
                'message' => 'Mvua kubwa inatarajiwa, linda mazao yako',
                'severity' => 'high'
            ]);
        }

        if ($temp > 35) {
            WeatherAlert::create([
                'farmer_id' => 1,
                'type' => 'heat',
                'message' => 'Joto kali linakuja, zingatia umwagiliaji',
                'severity' => 'medium'
            ]);
        }

        $this->info("Weather checked successfully");
    }
}
