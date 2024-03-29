<?php
namespace App\Http\Controllers;

use App\Services\Interfeces\UsersInterfaces;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $user;
    public function __construct(UsersInterfaces $usersInterfaces)
    {
        $this->user = $usersInterfaces;
    }
    public function showUser() {

        $users = $this->user->getAllUsers();

        return response()->json($users);
    }

    public function getUser($id) {

        $user = $this->user->getUserById($id);
        return redirect()->route('user.get')->with('user', $user);
    }

    public function createOrUpdate(Request $request, $id = null) {
        
        if (is_null($id)) {

            $this->user->createOrUpdate($id = null, $request);
        } else {

            $this->user->createOrUpdate($id, $request);
        }

        return redirect()->route('user.createOrUpdate')->with('message', "successful create or update");
    }

    public function deleteUser($id) {

        $user = $this->user->destroyUser($id);

        return redirect()->route('user.delete')->with('message', "successful delete");
    }
}
