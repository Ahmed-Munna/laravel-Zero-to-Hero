<?php

namespace App\Http\Controllers;

use App\Mail\SendOTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

            $user = Auth::user();

            return response()->json($user);
        } catch(Exception $ex) {

            Log::alert("alart mag", ["msg" => $ex->getMessage(), "Date" => time()]);
            return response()->json(["status" => "faild", "message" => "something went wrong"]);
        }
    }

    public function UserLogout(Request $request) {

        try {

            Auth::user()->tokens()->delete();

            return redirect()->route('login');
        } catch(Exception $ex) {

            Log::alert("alart mag", ["msg" => $ex->getMessage(), "Date" => time()]);
            return response()->json(["status" => "faild", "message" => "something went wrong"]);
        }
    }

    public function UserUpdate(Request $request) {

        try {

            $request->validate([
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'mobile' => 'required|string|max:50',
            ]);

            User::where('id', "=", Auth::id())->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'mobile' => $request->input('mobile'),
             ]);

             return response()->json(['status' => 'success', 'massege' => 'User update successfull'], 200);
        } catch(Exception $ex) {

            return response()->json(['status' => 'failed','massege' => $ex->getMessage()]);
        }

    }

    public function SendOTPCode(Request $request) {

        try {
            $request->validate([
                'email' => 'required|string|max:50',
            ]);

            $email = User::where('email', '=', $request->email)->count();
            if ($email == 0) {
                return response()->json(["status" => "faild", "message" => "invalid email"]);
            }

            $otp = rand(1000, 9999);

            User::where('email', '=', $request->email)->update(['otp' => $otp]);
            Mail::to($request->email)->send(new SendOTPMail($otp));

            return response()->json(["status" => "success", "message" => "OTP send successfull"]);
        } catch (Exception $ex) {

            Log::alert("alart mag", ["msg" => $ex->getMessage(), "Date" => time()]);
            return response()->json(["status" => "faild", "message" => "something went wrong"]);
        }
    }

    public function verifyOTP(Request $request) {

        try {

            $request->validate([
                'email' => 'required|string|max:50',
                'otp' => 'required|string|max:4',
            ]);

            $user = User::where('email', $request->input('email'))
                        ->where('otp', $request->input('otp'))
                        ->first();

            if ( !$user ) {

                return response()->json(["status" => "faild", "message" => "invalid user"]);
            }

            User::where('email', $request->input('email'))->update(['otp' => null]);
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(["status" => "success", "message" => "OTP Verify successful", "authToken" => $token]);

        } catch (Exception $ex) {

            return response()->json(["status" => "faild", "message" => $ex->getMessage()]);
        }
    }

    public function ResetPassword(Request $request) {

        try {

            $request->validate(['password' => 'required|string|min:6']);

            $id = Auth::id();
            User::where('id', '=', $id)->update(['password' => Hash::make($request->password)]);
            
            return response()->json(["status" => "success", "message" => "Password reset successful"]);
        } catch (Exception $ex) {

            return response()->json(["status" => "faild", "message" => $ex->getMessage()]);
        }
    }

}
