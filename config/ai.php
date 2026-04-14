<?php

return [
    'key' => env('OPENAI_API_KEY'),
    'model' => env('AI_MODEL', 'gpt-4o-mini'),
    'timeout' => env('AI_TIMEOUT', 30),
];
