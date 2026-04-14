<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIService
{
    /**
     * Send a prompt to OpenAI Responses API and get reply.
     *
     * @param string $prompt
     * @return string
     */
public function ask(string $prompt): string
{
    try {
        $response = Http::withToken(env('OPENAI_API_KEY'))
            ->timeout(env('AI_TIMEOUT', 30))
            ->post('https://api.openai.com/v1/responses', [
                'model' => env('AI_MODEL', 'gpt-4o-mini'),
                'input' => [
                    [
                        'role' => 'system',
                        'content' => [
                            [
                                'type' => 'input_text',
                                'text' => 'Wewe ni mtaalamu wa kilimo Tanzania. Jibu kwa Kiswahili rahisi kwa wakulima.'
                            ]
                        ]
                    ],
                    [
                        'role' => 'user',
                        'content' => [
                            [
                                'type' => 'input_text',
                                'text' => $prompt
                            ]
                        ]
                    ]
                ]
            ]);

        if ($response->failed()) {
            Log::error('OpenAI API Error', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            return 'OpenAI API Error';
        }

        $data = $response->json();

        foreach ($data['output'] ?? [] as $out) {
            foreach ($out['content'] ?? [] as $c) {
                if (isset($c['text'])) {
                    return $c['text'];
                }
            }
        }

        return 'Hakuna majibu kwa sasa.';

    } catch (\Throwable $e) {
        Log::error('AI Exception', ['error' => $e->getMessage()]);
        return 'AI haipatikani kwa sasa.';
    }
}
}
