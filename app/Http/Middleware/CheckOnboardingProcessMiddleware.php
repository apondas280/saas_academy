<?php

namespace App\Http\Middleware;

use App\Models\Onboarding;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOnboardingProcessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $query    = Onboarding::where('status', 0);
        $sequence = $query->value('sequence');

        if ($query->exists()) {
            return to_route('onboarding.step', $sequence);
        }

        return $next($request);
    }
}