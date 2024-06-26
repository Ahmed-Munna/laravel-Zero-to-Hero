<?php
namespace App\Services;

use App\Models\User;
use App\Services\Interfeces\UsersInterfaces;
use Illuminate\Support\Facades\Hash;

class UserService implements UsersInterfaces {

    public function getAllUsers() {

        return User::all();
    }
    public function getUserById($id) {

        return User::findOrFail($id);
    }
    public function createOrUpdate($id = null, $collection = []) {

        if (is_null($id)) {
            
            $user = new User();

            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make($collection['password']);

            return $user->save();
        }

        $user = User::findOrFail($id);

        $user->name = $collection['name'];
        $user->email = $collection['email'];
        $user->password = Hash::make($collection['password']);

        return $user->save();
    }
    public function destroyUser($id) {

        return User::destroy($id);
    }
}