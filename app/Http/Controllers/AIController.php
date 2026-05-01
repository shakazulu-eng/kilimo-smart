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

    public function autoAdvice(Request $request)
    {
        $weather = $request->input('weather');

        $prompt = "Hali ya hewa ni: $weather. Toa ushauri wa kilimo kwa Kiswahili.";

        $response = Http::withToken(env('GROQ_API_KEY'))
            ->post('https://api.groq.com/openai/v1/chat/completions', [
                "model" => "llama-3.1-8b-instant",
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $prompt
                    ]
                ]
            ]);

        if ($response->ok()) {
            return response()->json([
                'status' => 'success',
                'advice' => $response['choices'][0]['message']['content']
            ]);
        }

        return response()->json([
            'status' => 'error',
            'advice' => 'Imeshindikana kupata ushauri'
        ]);
    }
}
