<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AttackLog;

class AttackDetectionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $inputs = json_encode($request->all());

        // Simple XSS detection
        if (preg_match('/<script>|<\/script>/i', $inputs)) {
            AttackLog::create([
                'attack_type' => 'XSS',
                'payload' => $inputs,
                'ip_address' => $request->ip(),
                'url' => $request->fullUrl(),
            ]);
        }

        // Simple SQL Injection detection
        if (preg_match('/(union|select|insert|drop|update|delete)/i', $inputs)) {
            AttackLog::create([
                'attack_type' => 'SQL Injection',
                'payload' => $inputs,
                'ip_address' => $request->ip(),
                'url' => $request->fullUrl(),
            ]);
        }

        return $next($request);
    }
}
