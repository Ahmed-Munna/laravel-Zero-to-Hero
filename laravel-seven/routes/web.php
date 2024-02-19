<?php

use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SingleAction;
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

Route::post('/first', [FirstController::class, 'GetInfo'])->middleware('throttle:3,1')->name('getInfo');
Route::post('/single', SingleAction::class)->name('single');

Route::get('/product', [ProductController::class, 'getAllProduct']);
Route::get('/common', [ProductController::class, 'getCommonProduct']);
Route::get('/advance', [ProductController::class, 'getAdvanceProduct']);
Route::get('/group', [ProductController::class, 'getGroupProduct']);