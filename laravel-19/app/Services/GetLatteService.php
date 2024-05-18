<?php

namespace App\Services;

use App\Services\Interfeces\CoffeeShop;

class GetLatteService implements CoffeeShop
{
    private function getLatte()
    {
        return 'Enjoy latte';
    }

    public function makeCoffee()
    {
        return $this->getLatte();
    }
}