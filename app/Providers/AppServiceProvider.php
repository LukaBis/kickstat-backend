<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
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
        Http::macro('countries', function () {
            return Http::withHeaders([
                'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
                'x-rapidapi-key' => config('football-api.key'),
            ])->baseUrl(config('football-api.base_url').'countries');
        });
    }
}
