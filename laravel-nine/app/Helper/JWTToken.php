<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;

class JWTToken {

    public function createToken($userEmail):string {

        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-Token',
            'iat' => time(),
            'exp' => time() + 3600,
            'userEmail' => $userEmail,
        ];

        return JWT::encode($payload, $key, 'HS256');

    }

    public function verifyToken($token) {

        try {   

            $key = env('JWT_KEY');
            $decode = JWT::decode($token, new Key($key, 'HS256'));
            return $decode->userEmail;

        } catch(Exception $e) {

            return 'unauthorized';
        }


    }



}