<?php

namespace App\Services;

use App\Services\Interfeces\CoffeeShop;

class GetMochaService implements CoffeeShop
{
    private function getMocha()
    {
        return 'Enjoy Mocha!';
    }

    public function makeCoffee()
    {
        return $this->getMocha();
    }
}