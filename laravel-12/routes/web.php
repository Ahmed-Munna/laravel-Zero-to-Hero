<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/show-users', [UserController::class, 'ShowAllUsers'])->name('show-users');
Route::get('/user/{id}', [UserController::class,'getUser'])->name('user.get');
Route::post('/create-user/{id?}', [UserController::class,'createOrUpdate']);
Route::post('/delete-user/{id}', [UserController::class,'deleteUser']);
