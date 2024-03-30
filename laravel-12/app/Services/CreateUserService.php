<?php
namespace App\Services;

use App\Models\User;
use App\Services\Interfeces\CreateUserInterfece;
use Illuminate\Support\Facades\Hash;

class CreateUserService implements CreateUserInterfece
{
    public function showUsers()
    {
       return User::all();
    }

    public function getUserById($id) {

        return User::findOrFail($id);
    }

    public function createOrUpdate($id = null, $request) {

        if (is_null($id)) {
            
            $user = User::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email, 
                "password" => Hash::make($request->password), 
            ]);

            return "success";
        }

        $user = User::findOrFail($id);

        $user->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email, 
            "password" => Hash::make($request->password), 
        ]);

        return "success";
    }

    public function destroyUser($id) {

        return User::destroy($id);
    }
}