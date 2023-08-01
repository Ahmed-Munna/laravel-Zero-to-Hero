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




Route::controller(UserController::class)->group(function () {

    Route::get('/', 'index')->name('user.index');

    Route::prefix('/user')->group(function () {
        Route::get('/create', 'create')->name('user.create');
        Route::post('/store', 'store')->name('user.store');
    });
    
});
