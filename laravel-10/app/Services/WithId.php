<?php

namespace App\Services;

use App\Models\User;
use App\Services\interfaces\MakeSomething;
use Illuminate\Http\Request;

class WithId implements MakeSomething
{
    public function FindSomething($id)
    {

        return User::findOrFail($id);
    }
}