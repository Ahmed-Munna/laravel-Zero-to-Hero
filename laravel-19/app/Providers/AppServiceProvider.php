<?php

namespace App\Providers;

use App\Services\GetCappuccinoService;
use App\Services\GetLatteService;
use App\Services\GetMochaService;
use App\Services\Interfeces\CoffeeShop;
use App\Services\SendGift;
use App\Services\ShowNameService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind('ShowNameService', function () {
            
        //     return new ShowNameService;
        // });

        

        $this->app->bind(CoffeeShop::class, function (Application $app) {
            
            return new GetCappuccinoService($app->make(SendGift::class));
        });
        dd(app());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
