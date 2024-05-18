<?php

namespace App\Http\Controllers;

use App\Services\Interfeces\CoffeeShop;
use App\Services\ShowNameService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(CoffeeShop $coffeeShop) {

        return $coffeeShop->makeCoffee();
    }
}
