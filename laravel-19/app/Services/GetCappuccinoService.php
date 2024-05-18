<?php

namespace App\Services;

use App\Services\Interfeces\CoffeeShop;

class GetCappuccinoService implements CoffeeShop {

    private $getGift;

    public function __construct($getGift)
    {
        return $this->getGift = $getGift;
    }
    private function getCappuccino()
    {
        return 'Enjoy Cappuccino, ' . $this->getGift->sendAGift();
    }

    public function makeCoffee()
    {
        return $this->getCappuccino();
    }
}