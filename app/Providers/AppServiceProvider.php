<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        // Ensure company parameter is available for all URLs
        $this->app['router']->bind('company', function ($value) {
            return $value ?: 'default-company';
        });

        // Optionally, you can set a default company for URL generation
        URL::defaults(['company' => 'default-company']);
    }
}
