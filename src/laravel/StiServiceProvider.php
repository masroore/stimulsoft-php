<?php

namespace Stimulsoft\Laravel;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

if (class_exists('\Illuminate\Support\ServiceProvider')) {
    class StiServiceProvider extends ServiceProvider
    {
        public function boot(): void
        {
            Route::get('/vendor/stimulsoft/reports-php/scripts/{file}', function ($file) {
                return response()->file(__DIR__."/../../scripts/$file", ['Content-Type' => 'text/javascript']);
            });
            Route::get('/vendor/stimulsoft/dashboard-php/scripts/{file}', function ($file) {
                return response()->file(__DIR__."/../../../dashboard-php/scripts/$file", ['Content-Type' => 'text/javascript']);
            });
        }
    }
}
