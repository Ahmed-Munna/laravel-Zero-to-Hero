<?php

namespace App\Http\Controllers;

use App\Facades\Need;

class UsersController extends Controller
{

    public function UserProfile($id) {

        $data = Need::showUsers($id);

        return response()->json($data);
    }
}
