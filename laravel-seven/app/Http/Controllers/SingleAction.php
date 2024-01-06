<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleAction extends Controller
{
    
    public function __invoke(Request $request):string
    {

        return "Hello, I'm Single Action Controller";
    }
}
