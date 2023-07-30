<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return View::make('addUser', ['name' => 'Munna']);
    // return View::first(['addUser', 'name'], $data);
    if (View::exists('addUser')) {

        return View::make('addUser');
    }
});

Route::post('/store/{id}', [UserController::class, 'store'])->name('store');
Route::get('/create', [UserController::class, 'create'])->name('create');
