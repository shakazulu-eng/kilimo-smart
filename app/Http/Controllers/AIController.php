<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AIService;

class AIController extends Controller
{
    protected $ai;

    public function __construct(AIService $ai)
    {
        $this->ai = $ai;
    }

    /**
     * Test AI response
     */
    public function testAI()
    {
        // Hapa unaweza customize prompt kulingana na admin/student
        $prompt = "Nipe maelezo ya kilimo cha mahindi kwa mwezi huu wa Februari";

        $reply = $this->ai->ask($prompt);

        // Rudisha view au json
        return view('test-ai', compact('reply'));
    }
}
