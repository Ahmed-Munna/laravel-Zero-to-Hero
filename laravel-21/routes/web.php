<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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

Route::view('/', 'welcome')->name('home');

// User Routes
Route::view('/login', 'Auth.sign-in')->name('login')->middleware('IsLogedIn');
Route::view('/register', 'Auth.sign-up')->name('register')->middleware('IsLogedIn');
Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');

Route::post('/login-user', [AuthController::class, 'login'])->name('login-user');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/create-post', PostController::class)->name('create-post')->middleware('auth');