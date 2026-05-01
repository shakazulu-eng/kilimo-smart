<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function chat(Request $request)
    {
        $message = $request->input('message');

        $response = Http::withToken(env('GROQ_API_KEY'))
            ->post('https://api.groq.com/openai/v1/chat/completions', [
                "model" => "llama-3.1-8b-instant",
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $message
                    ]
                ]
            ]);

        if ($response->ok()) {
            return response()->json([
                'status' => 'success',
                'reply' => $response['choices'][0]['message']['content']
            ]);
        }

        return response()->json([
            'status' => 'error',
            'reply' => 'AI haijajibu (check API key au quota)'
        ]);
    }

               
                 
                 public function autoAdvice()
{
    try {
        // 🌦️ CHUKUA WEATHER (example: Dar es Salaam)
        $weatherResponse = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => 'Dar es Salaam',
            'appid' => env('WEATHER_API_KEY'),
            'units' => 'metric'
        ]);

        if (!$weatherResponse->ok()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Imeshindikana kupata weather data'
            ]);
        }

        $weatherData = $weatherResponse->json();

        $temp = $weatherData['main']['temp'];
        $condition = $weatherData['weather'][0]['description'];

        // 🤖 AI PROMPT
        $prompt = "Hali ya hewa ni $condition na joto ni $temp°C. Toa ushauri wa kilimo kwa mkulima kwa Kiswahili.";

        $aiResponse = Http::withToken(env('GROQ_API_KEY'))
            ->post('https://api.groq.com/openai/v1/chat/completions', [
                "model" => "llama-3.1-8b-instant",
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $prompt
                    ]
                ]
            ]);

        if ($aiResponse->ok()) {
            return response()->json([
                'status' => 'success',
                'weather' => "$condition, $temp°C",
                'advice' => $aiResponse['choices'][0]['message']['content']
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'AI haijajibu'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
}



 //       return response()->json([
   //         'status' => 'error',
     //       'advice' => 'Imeshindikana kupata ushauri'
       // ]);
   // }
//}
