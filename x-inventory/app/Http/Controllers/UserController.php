<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function UserRegistration(Request $request) {

        try {

            $request->validate([
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'mobile' => 'required|string|max:50',
                'email' => 'required|string|max:50|unique:users,email',
                'password' => 'required|string|min:6',
            ]);

            User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => Hash::make($request->input('password')),
             ]);

             return response()->json(['status' => 'success', 'massege' => 'User create successfull'], 201);
        } catch(Exception $ex) {

            return response()->json(['status' => 'failed','massege' => $ex->getMessage()]);
        }


    }

    public function UserLogin(Request $request) {

        try {

            $request->validate([
                'email' => 'required|string|max:50',
                'password' => 'required|string|min:6',
            ]);

            $user = User::where('email', $request->input('email'))->first();

            if ( !$user || !Hash::check($request->input('password'), $user->password)) {

                return response()->json(["status" => "faild", "message" => "invalid user"]);
            }

            $token = $user->createToken('token')->plainTextToken;

            return response()->json(["status" => "success", "message" => "Login successful", "token" => $token]);

        } catch (Exception $ex) {

            return response()->json(["status" => "faild", "message" => $ex->getMessage()]);
        }
    }

    public function UserProfile(Request $request) {

        try {

            $user = $request->user();

            return response()->json($user);
        } catch(Exception $ex) {

            Log::alert("alart mag", ["msg" => $ex->getMessage(), "Date" => time()]);
            return response()->json(["status" => "faild", "message" => "something went wrong"]);
        }
    }
}
