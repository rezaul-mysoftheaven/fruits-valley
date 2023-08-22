<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
    // public function boot(): void
    // {
    //     //
    // }
    //for validation phone number
    public function boot()
    {
        // Validator::extend('custom_phone', function ($attribute, $value, $parameters, $validator) {
        //     // Check if the phone number is either 11 digits with the specific prefix
        //     // or 14 digits with the specific international prefix
        //     return preg_match('/^(\+?8801[356789]\d{8}|01[356789]\d{8})$/', $value);
        // });

        //     // Custom error message for the custom_phone rule
        // Validator::replacer('custom_phone', function ($message, $attribute, $rule, $parameters) {
        //     return str_replace(':attribute', $attribute, 'The '.$attribute.' number is not valid for Bangladesh!');
        // });

    }
}
