<?php

namespace App\Providers;

use App\Services\Interfeces\UsersInterfaces;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(UsersInterfaces::class, function () {
            
        //     return new UserService();
        // });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
