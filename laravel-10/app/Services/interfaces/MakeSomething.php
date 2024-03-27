<?php

namespace App\Services\interfaces;

use Illuminate\Http\Request;

interface MakeSomething
{
    public function FindSomething(Request $request);
}