<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('recaptcha', function () {
            return '
            <style> .g-recaptcha > div { margin: 20px auto 10px auto; } </style>
            <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
            <div class="g-recaptcha" data-sitekey="{{ env(\'GOOGLE_RECAPTCHA_SITE_KEY\') }}"></div>
            ';
        });
    }
}
