<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware(['auth', 'verified']);

Route::post('/login-user', [AuthController::class, 'login'])->name('login-user');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// email verification

Route::view('/email/verify', 'Auth.Mails.verify-email')->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Post Routes
Route::get('/create-post', PostController::class)->name('create-post')->middleware('auth');

// 