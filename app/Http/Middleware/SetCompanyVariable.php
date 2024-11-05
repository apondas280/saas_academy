<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class SetCompanyVariable
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the current route has the 'company' parameter
        if ($request->route('company')) {
            $company = $request->route('company');

            // Share the 'company' parameter with all views
            View::share('company', $company);

            // Set a URL parameter for global usage
            URL::defaults(['company' => $company]);
        }

        return $next($request);
    }
}