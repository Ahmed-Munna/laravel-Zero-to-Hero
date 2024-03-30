<?php

namespace App\Http\Controllers;

use App\Services\Interfeces\CreateUserInterfece;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public $users;
    public function __construct(CreateUserInterfece $usersInterfaces)
    {
        $this->users = $usersInterfaces;
    }

    public function ShowAllUsers() {

        return  $this->users->showUsers();
    }

    public function getUser($id) {

        $user = $this->users->getUserById($id);
        return response()->json($user);
    }

    public function createOrUpdate(Request $request, $id = null) {
        return $this->users->createOrUpdate($id, $request);
        if (is_null($id)) {

            $this->users->createOrUpdate($id = null, $request);
        } else {

            $this->users->createOrUpdate($id, $request);
        }

        return response()->json([
            "status" => "success",
            "message" =>"successful create or update"
        ]);
    }

    public function deleteUser($id) {

        $this->users->destroyUser($id);

        return response()->json([
            "status" => "success",
            "message" =>"successful delete"
        ]);
    }
}
