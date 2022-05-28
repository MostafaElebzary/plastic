<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $Setting = Setting::find(1);
        view()->share('Settings', $Setting);
        $about_us = page::find(1);
        view()->share('about_us', $about_us);
        $contact_us = page::find(2);
        view()->share('contact_us', $contact_us);


    }
}
