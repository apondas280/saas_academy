<?php

namespace App\Providers;

use App\Models\Addon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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

        // load addon service providers
        $this->registerAddonResources();
    }

    public function registerAddonResources()
    {
        $addonsPath    = app_path('Addons');
        $companyAddons = Addon::where('status', 1)->pluck('identifier')->toArray();

        if (File::isDirectory($addonsPath)) {
            $addons = File::directories($addonsPath);

            // register each addon for the company
            foreach ($addons as $addon) {
                if (in_array(basename($addon), $companyAddons)) {
                    $this->registerAddonProviders($addon);
                    $this->loadAddonMigrations($addon);
                    $this->loadAddonViews($addon);
                }
            }
        }
    }

    public function registerAddonProviders($addon): void
    {
        $providerPath = $addon . '/Providers/AddonServiceProvider.php';

        if (File::exists($providerPath)) {
            $namespace = 'App\\Addons\\' . basename($addon) . '\\Providers\\AddonServiceProvider';
            $this->app->register($namespace);
        }
    }
    public function loadAddonViews($addon): void
    {
        $viewsPath = $addon . '/views';

        if (File::isDirectory($viewsPath)) {
            $viewNamespace = basename($addon);
            $this->loadViewsFrom($viewsPath, $viewNamespace);
        }
    }
    public function loadAddonMigrations($addon): void
    {
        $migrationsPath = $addon . '/database/migrations';

        if (File::isDirectory($migrationsPath)) {
            $this->loadMigrationsFrom($migrationsPath);
        }
    }
}
