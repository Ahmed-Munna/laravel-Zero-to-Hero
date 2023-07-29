<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //    $data = User::all();
    //    return view('allUser', compact('data'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     $data = User::all();
    //     return view('user', compact('data'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email
    //     ]);

    //     return redirect()->back();
    // }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = User::all();
        return view('user', compact('data'));
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
    public function update(Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     User::destroy($id);

    //     return redirect()->back();
    // }
}
