<?php

use App\Http\Controllers\EmailVarificationController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\HaveAnyAdmin;
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

Route::view('/', 'home')->name('home');

Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
    
Route::post('/registration', [RegisterController::class, 'register'])->name('admin-register')->middleware(['haveAdmin', 'web']);

Route::controller(EmailVarificationController::class)->group(function() {
    Route::
});
// Route::view('dashboard', 'dashboard')->name('dashboard');
