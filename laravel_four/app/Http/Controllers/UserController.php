<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userData = User::all();

        return view('users', compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUserRequest $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|unique:users|max:255',
        //     'email' => 'required|email'
        // ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
