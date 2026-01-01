<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PremiumOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !auth()->user()->isPremium()) {
            return redirect()->route('dashboard')
                ->with('error', 'Fitur ini hanya untuk akun Premium ⭐');
        }

        return $next($request);
    }
}
