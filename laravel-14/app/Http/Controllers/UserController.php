<?php

namespace App\Http\Controllers;

use App\Events\CreateUsers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create($request->all());
        event(new CreateUsers($user));

        return $user;
    }
}
