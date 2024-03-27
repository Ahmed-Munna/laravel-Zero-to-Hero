<?php

namespace App\Http\Controllers;

use App\Services\interfaces\MakeSomething;
use Illuminate\Http\Request;

class CheckServiceController extends Controller
{
    public function CheckAllUsers(Request $request, MakeSomething $makeSomething)
    {
        $users = $makeSomething->FindSomething($request);
        return response()->json($users);
    }

    public function CheckSpasificUsers(Request $request, MakeSomething $makeSomething)
    {
   
        $users = $makeSomething->FindSomething($request->input('id'));


        return response()->json($users);

    }
}
