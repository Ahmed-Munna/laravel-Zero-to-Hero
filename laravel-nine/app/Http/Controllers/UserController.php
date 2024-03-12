<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PHPUnit\TextUI\XmlConfiguration\Logging\Logging;

class UserController extends Controller
{
    
    public function UserRegistration(Request $request) {

        try {
            User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
             ]);

             return response()->json([
                'massege' => 'User create successful',
                'status' => 'success'
             ], 201);
        } catch(Exception $ex) {

            Log::alert("User createion error " . $ex->getMessage());

            return response()->json([
                'massege' => 'faild',
                'status' => 'faild'
            ], 200);
        }


    }
}

