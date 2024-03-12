<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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

    public function UserLogin(Request $request) {

        try {

            $user = User::where('email', '=', $request->input('email'))
                    ->where('password', '=', $request->input('password'))->count();
            if ($user == 1) {

                $token = JWTToken::createToken($request->input('email'), 60);

                return response()->json([
                    'status' => 'successful',
                    'message' => 'login successfull',
                    'token' => $token
                ]);
            } else {
            
                return response()->json([
                    'status' => 'faild',
                    'message' => 'unauthorized',
                ], 201);
            }

        } catch(Exception $ex) {

            Log::alert("User createion error " . $ex->getMessage());

            return response()->json([
                'status' => 'faild',
                'message' => 'createion error'
            ]);
        }

    }

    public function SendOTP(Request $request) {

        try {

            $mail = User::where('email', '=', $request->input('email'))->count();

            if ($mail == 1) {

                $otp = rand(1000, 9999);
                User::where('email', '=', $request->input('email'))->update(['otp' => $otp]);
                Mail::to($request->input('email'))
                    ->send(new OTPMail($otp));

                return response()->json([
                        'status' => 'success',
                        'message' => 'Send otp on your email'
                    ], 200);
            } else {

                return response()->json([
                    'status' => 'faild',
                    'message' => 'unauthorige'
                ], 200);
            }
        } catch (Exception $ex) {

            Log::alert("User createion error " . $ex->getMessage());

            return response()->json([
                'status' => 'faild',
                'message' => 'createion error'
            ]);
        }
    }

    public function VerifyOTP(Request $request) {

        try {

            $email = $request->input('email');
            $otp = $request->input('otp');
            $user = User::where('email', '=', $email)
                        ->where('otp', '=', $otp)
                        ->count();

            if ($user == 1) {

                User::where('email', '=', $email)
                    ->update(['otp' => null]);
                $token = JWTToken::createToken($email, 5);

                return response()->json([
                    'status' => 'successful',
                    'message' => 'OTP verify successfull',
                    'token' => $token
                ], 200);

            } else {
                return response()->json([
                    'status' => 'faild',
                    'message' => 'unauthorige'
                ], 200);
            }
        } catch (Exception $ex) {

            Log::alert("User createion error " . $ex->getMessage());

            return response()->json([
                'status' => 'faild',
                'message' => 'createion error'
            ]);
        }

        
    }
}

