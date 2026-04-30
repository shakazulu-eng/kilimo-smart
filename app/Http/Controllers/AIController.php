<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function chat(Request $request)
    {
        $userMessage = $request->input('message');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            "model" => "llama3-8b-8192",
            "messages" => [
                [
                    "role" => "system",
                    "content" => "You are a helpful AI assistant specialized in agriculture and weather advice."
                ],
                [
                    "role" => "user",
                    "content" => $userMessage
                ]
            ]
        ]);

        if ($response->failed()) {
            return response()->json([
                'reply' => 'Error kutoka AI, jaribu tena.'
            ]);
        }

        $reply = $response['choices'][0]['message']['content'];

        return response()->json([
            'reply' => $reply
        ]);
    }

    // 🔥 AUTO AGRICULTURE ADVICE
    public function autoAdvice(Request $request)
    {
        $weather = $request->input('weather');

        $prompt = "Based on this weather: $weather, give farming advice to a farmer in simple Swahili.";

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

        $reply = $response['choices'][0]['message']['content'];

        return response()->json([
            'advice' => $reply
        ]);
    }
}
