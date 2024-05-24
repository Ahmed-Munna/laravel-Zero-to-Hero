<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function registerUser(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        $data = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        auth()->guard('admin')->login($data);

        return redirect()->route('admin-dashboard');
    } 

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        $remember = $request->has('remember') ? true : false;

        if (auth()->guard('admin')->attempt([
            'email' => $request->email, 
            'password' => $request->password
        ], $remember)) {

                return redirect()->route('admin-dashboard');
        } else {
            return redirect()->back()->withErrors('error', 'Email or password is incorrect');
        }
    }

    public function logout() {
        auth()->guard('admin')->logout();
        return redirect()->route('home');
    }
}
