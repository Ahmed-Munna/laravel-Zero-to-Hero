<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function GetInfo(Request $request) {

        $name = $request->input('name');
        $age = $request->input('age');

        foreach($request->input() as $inp) {
            
        }
        return ;
    }
}
