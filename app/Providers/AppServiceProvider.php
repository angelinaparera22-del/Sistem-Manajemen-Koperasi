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
        try {
            $settings = Setting::pluck('value', 'key');
            $setting = (object) $settings->all();
            View::share('setting', $setting);
        } catch (\Exception $e) {
            // database tidak ditemukan
        }
    }
}
