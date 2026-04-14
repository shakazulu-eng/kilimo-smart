<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Crop;
use App\Models\CropRegion;

class WeatherController extends Controller
{
    public function index()
    {
        return view('student.weather');
    }

    public function search(Request $request)
    {
        $request->validate([
            'location' => 'required|string'
        ]);

        $location = $request->location;

        $apiKey = env('WEATHER_API_KEY');
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => $location,
            'appid' => $apiKey,
            'units' => 'metric'
        ]);

        if ($response->failed()) {
            return back()->with('error', 'Imeshindikana kupata hali ya hewa. Hakikisha mji umesahihi.');
        }

        $data = $response->json();

        // Tenga crops kulingana na location
        $regionCrops = CropRegion::where('region', $location)->pluck('crop_id')->toArray();
        $crops = Crop::whereIn('id', $regionCrops)->get();

        $advice = [
            'crops_to_plant' => [],
            'crops_not_to_plant' => [],
            'general_advice' => []
        ];

        foreach ($crops as $crop) {
            $cropAdvice = '';
            $notRecommended = false;

            // Temp logic
            if ($data['main']['temp'] > $crop->max_temp) {
                $cropAdvice .= "Joto ni kubwa kuliko inavyofaa kwa {$crop->name}. Hakikisha unapatia umwagiliaji.\n";
                $notRecommended = true;
            } elseif ($data['main']['temp'] < $crop->min_temp) {
                $cropAdvice .= "Baridi zaidi ya inavyofaa kwa {$crop->name}. Fikiria kuchagua zao lenye tolerance ya baridi.\n";
                $notRecommended = true;
            }

            // Rain logic
            if ($data['weather'][0]['main'] === 'Rain') {
                $cropAdvice .= "{$crop->name} inaweza kustawi vizuri kwa mvua hizi.\n";
            }

            // Humidity logic
            if ($data['main']['humidity'] > 70) {
                $cropAdvice .= "Unyevu mkubwa unaweza kuathiri {$crop->name}, zingatia magonjwa ya mimea.\n";
            }

            if ($notRecommended) {
                $advice['crops_not_to_plant'][] = $crop->name;
            } else {
                $advice['crops_to_plant'][] = $crop->name;
            }

            if ($cropAdvice) {
                $advice['general_advice'][] = $cropAdvice;
            }
        }

        $advice['general_advice'] = implode("\n", $advice['general_advice']);

        return view('student.weather-standalone', compact('data', 'advice'));
    }
}
