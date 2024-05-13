<?php

namespace App\Http\Controllers;

use App\Events\OrderShiped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Process;

class UserController extends Controller
{
    public function submit(Request $request) {
        $orderId = rand(1000, 9999);
        $data = ["orderId" => $orderId,"name" => "Munna", "address" => "Dhaka"];
        OrderShiped::dispatch((object) $data);
        return redirect()->back();
    }

    // public function submit(Request $request) {

    //     $result = Process::run('This is a test')->throw();
        
    //     dd($result);

    //     return redirect()->back()->with("msg", $result);
    // }
}
