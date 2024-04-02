<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class ProvideWhatUserNeed
{
    public function showUsers($id)
    {
        return User::findOrFail($id);
    }

    public function createUser($name, $email, $password){

        return User::create([
            "name" => $name,
            "email" => $email,
            "password" => Hash::make($password),
        ]);
    }
}