<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request) {

        $request->validate([
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'birthday' => 'required|string|max:250',
            'gender' => 'required|string|max:250',
            'phone' => 'required',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
            'remember' => 'required'
        ]);

        $user = User::create([
            'name' => $request->first_name . " " . $request->last_name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);


        event(new Registered($user));
        $credentials = $request->only('email', 'phone');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return $request;
    }
}
