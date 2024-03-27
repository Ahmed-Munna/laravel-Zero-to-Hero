<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckServiceController;
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

Route::post('/user-registration', [AuthController::class, 'UserRegistration']);
Route::post('/user-login', [AuthController::class, 'UserLogin']);
Route::post('/send-otp', [AuthController::class, 'SendOTPCode']);
Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);
Route::post('/reset-password', [AuthController::class, 'ResetPassword'])->middleware('auth:sanctum');
Route::get('/user-profile', [AuthController::class, 'UserProfile'])->middleware('auth:sanctum', 'user.auth');
Route::post('/user-update', [AuthController::class, 'UserUpdate'])->middleware('auth:sanctum', 'user.auth');
Route::post('/user-logout', [AuthController::class, 'UserLogout'])->middleware('auth:sanctum', 'user.auth');

// admin 

Route::post('/admin-registration', [AdminController::class, 'AdminRegistration'])->middleware('has.admin');
Route::post('/admin-login', [AdminController::class, 'AdminLogin']);
Route::post('/admin-logout', [AdminController::class, 'AdminLogout'])->middleware('auth:sanctum', 'admin.auth');
Route::get('/admin-profile', [AdminController::class, 'AdminProfile'])->middleware('auth:sanctum', 'admin.auth');


Route::view('/login', 'login')->name('login');


// test toute

Route::post('/withoutId', [CheckServiceController::class, 'CheckAllUsers']);
Route::post('/withId', [CheckServiceController::class, 'CheckSpasificUsers']);