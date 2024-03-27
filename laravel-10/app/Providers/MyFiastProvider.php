<?php

namespace App\Providers;

use App\Services\interfaces\MakeSomething;
use App\Services\WithId;
use App\Services\WithoutId;
use Illuminate\Support\ServiceProvider;

class MyFiastProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MakeSomething::class, function () {
            
            $getId = request()->id;

            if ($getId !== null) {

                return new WithId();
            } else {

                return new WithoutId();
            }
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
