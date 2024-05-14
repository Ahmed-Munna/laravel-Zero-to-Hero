<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/submit', [UserController::class, 'submit'])->name('submit');

Route::get('/language/{lang}', function ($lang) {

    App::setLocale($lang);
    session()->put('locale', $lang);

    return back();
})->name('lang');

Route::get('/user', function () {

    $response = Http::get('https://jsonplaceholder.typicode.com/todos/1');
    Storage::disk('local')->put('Users/todos.json', $response->body());

    // dd($response->json());
    return $response->status();
})->name('user');
