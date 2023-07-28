<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\Category;

class OneController extends Controller
{
    // public function show() {
    //     return "something";
    // }

    // public function show (Category $category) {

    //     return $category->value;
    // }

    public function show (User $user) {
        return $user->name;
    }

}
