<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;

class JWTToken {

    public static function createToken($userEmail, $time):string {

        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-Token',
            'iat' => time(),
            'exp' => time() + 60 * $time,
            'userEmail' => $userEmail,
        ];

        return JWT::encode($payload, $key, 'HS256');

    }

    public static function verifyToken($token) {

        try {   

            $key = env('JWT_KEY');
            $decode = JWT::decode($token, new Key($key, 'HS256'));
            return $decode->userEmail;

        } catch(Exception $e) {

            return 'unauthorized';
        }


    }



}