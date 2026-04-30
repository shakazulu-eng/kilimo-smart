<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    // 💬 CHAT FUNCTION
    public function chat(Request $request)
    {
        try {
            $userMessage = $request->input('message');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                "model" => "llama3-8b-8192",
                "messages" => [
                    [
                        "role" => "system",
                        "content" => "You are a helpful AI assistant specialized in agriculture and weather advice. Reply in Swahili."
                    ],
                    [
                        "role" => "user",
                        "content" => $userMessage
                    ]
                ]
            ]);

            // 🔴 SHOW REAL ERROR FROM GROQ
            if ($response->failed()) {
                return response()->json([
                    'status' => 'error',
                    'source' => 'groq',
                    'details' => $response->body()
                ], 500);
            }

            // 🔴 HANDLE BAD RESPONSE FORMAT
            if (!isset($response['choices'][0]['message']['content'])) {
                return response()->json([
                    'status' => 'error',
                    'source' => 'format',
                    'details' => $response->body()
                ], 500);
            }

            $reply = $response['choices'][0]['message']['content'];

            return response()->json([
                'status' => 'success',
                'reply' => $reply
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'source' => 'server',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // 🌾 AUTO FARMING ADVICE
    public function autoAdvice(Request $request)
    {
        try {
            $weather = $request->input('weather');

            $prompt = "Hali ya hewa ni: $weather. Toa ushauri wa kilimo kwa mkulima kwa lugha rahisi ya Kiswahili.";

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                "model" => "llama3-8b-8192",
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $prompt
                    ]
                ]
            ]);

            // 🔴 SHOW REAL ERROR
            if ($response->failed()) {
                return response()->json([
                    'status' => 'error',
                    'source' => 'groq',
                    'details' => $response->body()
                ], 500);
            }

            // 🔴 HANDLE FORMAT ISSUE
            if (!isset($response['choices'][0]['message']['content'])) {
                return response()->json([
                    'status' => 'error',
                    'source' => 'format',
                    'details' => $response->body()
                ], 500);
            }

            $reply = $response['choices'][0]['message']['content'];

            return response()->json([
                'status' => 'success',
                'advice' => $reply
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'source' => 'server',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
