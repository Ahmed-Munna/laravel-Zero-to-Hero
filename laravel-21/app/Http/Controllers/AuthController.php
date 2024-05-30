<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerUser(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        auth()->login($data);

        return redirect()->route('dashboard');
    } 

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        $remember = $request->has('remember') ? true : false;
        if (auth()->attempt([
            'email' => $request->email, 
            'password' => $request->password
        ], $remember)) {

                return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors('error', 'Email or password is incorrect');
        }
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }
}
