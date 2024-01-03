<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    
    public function personal(Request $request):string {

        $name = $request->input('name');
        $age = $request->input('age');

        return "My name is $name and age is $age";
    }
}
