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
        // 🔑 hakikisha key ipo
        if (!env('WEATHER_API_KEY')) {
            return response()->json([
                'status' => 'error',
                'message' => 'WEATHER_API_KEY haijawekwa'
            ]);
        }

        // 🌦️ pata weather
        $weatherResponse = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => 'Dar es Salaam',
            'appid' => env('OPENWEATHER_API_KEY'),
            'units' => 'metric'
        ]);

        if (!$weatherResponse->ok()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Weather API imekataa request',
                'debug' => $weatherResponse->body()
            ]);
        }

        $data = $weatherResponse->json();

        // 🛑 safe extraction
        $temp = $data['main']['temp'] ?? null;
        $condition = $data['weather'][0]['description'] ?? null;

        if (!$temp || !$condition) {
            return response()->json([
                'status' => 'error',
                'message' => 'Weather data haijakamilika',
                'debug' => $data
            ]);
        }

        // 🤖 AI
        $prompt = "Hali ya hewa ni $condition na joto ni $temp°C. Toa ushauri wa kilimo kwa Kiswahili.";

        $ai = Http::withToken(env('GROQ_API_KEY'))
            ->post('https://api.groq.com/openai/v1/chat/completions', [
                "model" => "llama-3.1-8b-instant",
                "messages" => [
                    ["role" => "user", "content" => $prompt]
                ]
            ]);

        if (!$ai->ok()) {
            return response()->json([
                'status' => 'error',
                'message' => 'AI imekataa request',
                'debug' => $ai->body()
            ]);
        }

        $reply = $ai['choices'][0]['message']['content'] ?? null;

        if (!$reply) {
            return response()->json([
                'status' => 'error',
                'message' => 'AI response haipo',
                'debug' => $ai->body()
            ]);
        }

        return response()->json([
            'status' => 'success',
            'weather' => "$condition, $temp°C",
            'advice' => $reply
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Server crash',
            'debug' => $e->getMessage()
        ]);
    }
}  

               
//       return response()->json([
   //         'status' => 'error',
     //       'advice' => 'Imeshindikana kupata ushauri'
       // ]);
   // }
//}
