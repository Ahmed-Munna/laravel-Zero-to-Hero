<?php

use App\Http\Controllers\SendEmailController;
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

Route::post("/SendEmail", [SendEmailController::class, 'SendEmail']);
Route::post("/sendOtp", [SendEmailController::class, 'sendOtp']);
Route::post("/LowPriority", [SendEmailController::class, 'sendLowPriorityEmail']);
Route::post('/VideoProcessing', [SendEmailController::class, 'VideoProcessing']);

