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
            $setting = new \App\Models\Setting();
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $settings = Setting::pluck('value', 'key');
                $setting = new \App\Models\Setting($settings->all());
            }
            View::share('setting', $setting);
        } catch (\Exception $e) {
            View::share('setting', new \App\Models\Setting());
        }
    }
}
