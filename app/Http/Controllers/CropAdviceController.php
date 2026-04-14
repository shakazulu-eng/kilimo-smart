<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CropAdviceController extends Controller
{
    public function getAdvice(Request $request)
{
    $request->validate([
        'city' => 'required',
        'crop' => 'required',
    ]);

    $city = $request->city;
    $crop = $request->crop;

    $apiKey = env('WEATHER_API_KEY');

    $url = "https://api.openweathermap.org/data/2.5/forecast?q=$city&units=metric&appid=$apiKey";

    $response = Http::get($url);

    if ($response->failed()) {
        return back()->with('error', 'Imeshindikana kupata forecast ya hali ya hewa.');
    }

    $data = $response->json();

    // 🧮 CHUKUA AVERAGE YA SIKU 5
    $temps = [];
    $humidity = [];
    $rain = [];

    foreach ($data['list'] as $item) {
        $temps[] = $item['main']['temp'];
        $humidity[] = $item['main']['humidity'];
        $rain[] = $item['rain']['3h'] ?? 0;
    }

    $weather = [
        'temp' => round(array_sum($temps) / count($temps), 1),
        'humidity' => round(array_sum($humidity) / count($humidity)),
        'rain' => round(array_sum($rain), 1),
    ];

    $advice = $this->cropLogic($crop, $weather);

    return view('student.crop-advice.result', compact(
        'city', 'crop', 'weather', 'advice'
    ));
}


    private function cropLogic($crop, $weather)
    {
        $temp = $weather['temp'];
        $rain = $weather['rain'];
        $humidity = $weather['humidity'];

        switch ($crop) {

            case 'maize':
                if ($temp > 32) return "⚠ Joto kali kwa mahindi.";
                if ($rain < 5) return "🚿 Mvua ni kidogo kwa mahindi.";
                return "✅ Hali ya hewa nzuri kwa mahindi.";

            case 'rice':
                if ($rain < 10) return "⚠ Mpunga unahitaji maji mengi.";
                return "🌾 Hali ya hewa nzuri kwa mpunga.";

            case 'beans':
                if ($rain > 20) return "❌ Mvua nyingi ni hatari kwa maharage.";
                return "✅ Hali ya hewa nzuri kwa maharage.";

            case 'groundnuts':
                if ($humidity > 75) return "⚠ Unyevu mkubwa hatari kwa karanga.";
                return "🥜 Hali nzuri kwa karanga.";

            case 'cassava':
                if ($rain < 3) return "⚠ Mihogo inahitaji maji.";
                return "🍠 Hali nzuri kwa mihogo.";

            case 'banana':
                if ($temp < 20) return "⚠ Baridi hatari kwa ndizi.";
                return "🍌 Hali nzuri kwa ndizi.";

            case 'sorghum':
                if ($rain < 4) return "⚠ Mtama hustahimili ukame, ila maji ya ziada yafaa.";
                return "🌾 Hali nzuri kwa mtama.";

            case 'millet':
                return "🌾 Uwele hustahimili hali kavu.";

            case 'sunflower':
                if ($rain > 15) return "⚠ Alizeti haipendi maji mengi.";
                return "🌻 Hali nzuri kwa alizeti.";

            case 'cotton':
                if ($humidity > 80) return "⚠ Unyevu mkubwa huleta magonjwa ya pamba.";
                return "🧵 Hali nzuri kwa pamba.";

            case 'coffee':
                if ($temp > 30) return "⚠ Joto kali linaathiri kahawa.";
                return "☕ Hali nzuri kwa kahawa.";

            case 'tea':
                if ($temp > 28) return "⚠ Joto kali si nzuri kwa chai.";
                return "🍃 Hali nzuri kwa chai.";

            default:
                return "🌱 Hakuna ushauri maalum kwa zao hili.";
        }
    }
}
