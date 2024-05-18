<?php

// // service interface or ingridi
// interface Coffee {

//     public function serve();
// }

// // service 1
// class Cappuccino implements Coffee {

//     public function serve() {
//         echo "Serve cappuccino";
//     }
// }

// // service 2
// class Latte implements Coffee {

//     public function serve() {
//         echo "Serve latte";
//     }
// }

// // service container
// class Shop {

//     private $SetCoffeeName = [];
//     public function register($SetCoffeeName, callable $coffee) {
        
//         return $this->SetCoffeeName[$SetCoffeeName] = $coffee;
//     }

//     public function ServeCoffee($SetCoffeeName) {
        
//         return $this->SetCoffeeName[$SetCoffeeName]()->serve();
//     }

// }

// // service resolver
// $coffeeServiceContainer = new CoffeeShop();

// // register services
// $coffeeServiceContainer->register("cappuccino", function() { return new Cappuccino(); });
// $coffeeServiceContainer->register("latte", function() { return new Latte(); });


// // call service
// $coffeeServiceContainer->ServeCoffee("latte");