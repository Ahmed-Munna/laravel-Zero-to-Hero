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

Route::view('/login', 'Auth.sign-in')->name('login')->middleware('isLogedIn');
Route::view('/register', 'Auth.sign-up')->name('register')->middleware('isLogedIn');
Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');

Route::post('/login-user', [UserController::class, 'login'])->name('login-user');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register-user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');