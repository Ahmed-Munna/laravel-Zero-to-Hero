<?php

namespace App\Providers;

use App\Services\CreateUserService;
use App\Services\Interfeces\CreateUserInterfece;
use Illuminate\Support\ServiceProvider;

class AllUsersProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CreateUserInterfece::class, function () {

            return new CreateUserService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
