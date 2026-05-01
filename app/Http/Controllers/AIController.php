<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function chat(Request $request)
    {
        try {
            $message = $request->input('message');

            $response = Http::withToken(env('GROQ_API_KEY'))
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    "model" => "llama-3.1-8b-instant",
                    "messages" => [
                        ["role" => "user", "content" => $message]
                    ]
                ]);

            if (!$response->ok()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Groq error',
                    'debug' => $response->body()
                ]);
            }

            return response()->json([
                'status' => 'success',
                'reply' => $response['choices'][0]['message']['content'] ?? 'No reply'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Server crash (chat)',
                'debug' => $e->getMessage()
            ]);
        }
    }

    public function autoAdvice()
    {
        try {
            // 🌦️ GET WEATHER
            $weatherResponse = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => 'Dar es Salaam',
                'appid' => env('WEATHER_API_KEY'),
                'units' => 'metric'
            ]);

            if (!$weatherResponse->ok()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Weather API error',
                    'debug' => $weatherResponse->body()
                ]);
            }

            $data = $weatherResponse->json();

            $temp = $data['main']['temp'] ?? 'N/A';
            $condition = $data['weather'][0]['description'] ?? 'unknown';

            // 🤖 AI REQUEST
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
                    'message' => 'AI error',
                    'debug' => $ai->body()
                ]);
            }

            return response()->json([
                'status' => 'success',
               'weather' => $condition . ', ' . $temp . '°C',
                'advice' => $ai['choices'][0]['message']['content'] ?? 'No advice'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Server crash (advice)',
                'debug' => $e->getMessage()
            ]);
        }
    }
}
