<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        if (Schema::hasTable('settings')) {
            $settings = Setting::all();
            foreach ($settings as $setting) {
                define(strtoupper($setting->name), $setting->getValue());
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
