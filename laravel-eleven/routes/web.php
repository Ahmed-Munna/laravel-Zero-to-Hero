<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/users', [UserController::class,'showUser'])->name('user.show');
Route::get('/user/get/{id}', [UserController::class,'getUser'])->name('user.get');
Route::post('/user/create', [UserController::class,'createOrUpdate'])->name('user.createOrUpdate');
Route::put('/user/edit/{id}', [UserController::class,'createOrUpdate'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class,'deleteUser'])->name('user.delete');