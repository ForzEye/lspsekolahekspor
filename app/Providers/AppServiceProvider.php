<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
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
        // Share global settings to all views
        View::composer('*', function ($view) {
            try {
                $view->with('globalSettings', Setting::pluck('value', 'key'));
                $view->with('globalContact', \App\Models\ContactInfo::first());
            } catch (\Exception $e) {
                // Graceful fallback if DB not ready
                $view->with('globalSettings', collect());
                $view->with('globalContact', null);
            }
        });
    }
}
