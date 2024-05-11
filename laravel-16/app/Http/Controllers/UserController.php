<?php

namespace App\Http\Controllers;

use App\Events\SomethingHappended;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function WhatHappen() {

        event(new SomethingHappended());
        return response()->json(["status" => "success", "message" => "Happened"]);
    }
}
