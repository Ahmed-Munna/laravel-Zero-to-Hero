<?php

namespace App\Providers;

use App\Services\CreateUserService;
use App\Services\Interfeces\CreateUserInterfece;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
