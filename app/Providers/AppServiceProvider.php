<?php

namespace App\Providers;

use PostHog\PostHog;
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
        // Inisialisasi PostHog hanya jika API key tersedia
        if (!empty(config('posthog.api_key'))) {
            PostHog::init(config('posthog.api_key'), ['host' => config('posthog.host')]);            
        }

        // Ubah path public hanya jika bukan di environment local
        // if (config('app.env') !== 'local') {
        //     $this->app->bind('path.public', function () {
        //         return realpath(base_path('../app.temandhuafa.id')) ?: base_path('../app.temandhuafa.id');
        //     });
        // }
    }
}