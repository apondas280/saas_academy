<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StorageCheckerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Collect all files from the request
        $files = collect($request->allFiles());

        // Calculate the total size of all files
        $totalFileSize = $files->reduce(function ($carry, $file) {
            return $carry + ($file->getSize() / (1024 * 1024));
        }, 0);

        // Get company subscription and storage details
        $package_details = get_company_subscription()->package;
        $totalUsage      = get_company_storage_usage(false);

        // Check if the total usage (current usage + new file size) exceeds package limit
        if (($totalUsage + $totalFileSize) > $package_details->storage) {
            return redirect()->back()->with('error', get_phrase('Ops! Not enough space.'));
        }

        // Proceed with the request if storage is sufficient
        return $next($request);
    }
}