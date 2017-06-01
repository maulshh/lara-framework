<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Schema::defaultStringLength(191);
        if (Schema::hasTable('settings')) {
            $settings = Setting::where('boot', true)->get();
            foreach ($settings as $setting) {
                if (!defined(strtoupper($setting->name))) define(strtoupper($setting->name), $setting->value);
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}