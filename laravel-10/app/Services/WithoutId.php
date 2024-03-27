<?php

namespace App\Services;

use App\Models\User;
use App\Services\interfaces\MakeSomething;
use Illuminate\Http\Request;

class WithoutId implements MakeSomething {

    public function FindSomething(Request $request)
    {
        return User::all();
    }
}