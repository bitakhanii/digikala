<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
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
        /**
         * Usage: validate persian numbers as a numeric value
         * how to use: 'area_code' => ['min:3', 'max:4','persian_numbers']
         */
        Validator::extend('persian_numbers', function ($attributes, $value, $parameters, $validation) {
            $persian_numbers = [
                '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹',
                '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
            ];

            $input = $value;
            if (!$input) {
                return false;
            }
            $chars = preg_split('//u', $input, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($chars as $char) {
                if (!in_array($char, $persian_numbers)) {
                    return false;
                }
            }

            return true;
        });
    }
}
