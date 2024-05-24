<?php

use App\Http\Controllers\AdminController;
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
})->name('home');

// User Routes
Route::view('/login', 'Auth.sign-in')->name('login')->middleware('isLogedIn');
Route::view('/register', 'Auth.sign-up')->name('register')->middleware('isLogedIn');
Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');

Route::post('/login-user', [UserController::class, 'login'])->name('login-user');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register-user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes

Route::view('/admin-login', 'Admin.sign-in')->name('admin-login');
Route::view('/admin-register', 'Admin.sign-up')->name('admin-register');
Route::view('/admin-dashboard', 'Admin.dashboard')->name('admin-dashboard')->middleware('auth:admin');

Route::post('/login-admin', [AdminController::class, 'login'])->name('login-admin');
Route::post('/register-admin', [AdminController::class, 'registerUser'])->name('register-admin');
//Route::get('/logout-admin', [AdminController::class, 'logout'])->name('logout')->middleware('auth');