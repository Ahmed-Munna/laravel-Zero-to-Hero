<?php

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

Route::get('/', function () {
    return view('welcome');
});
// Route::redirect('/','/home',392);
// Route::get('/home', function () {
//     return view('home');
// });
// Route::match(['post', 'put'], '/data', function (Request $data) {
//     return $data;
// })->name('data');
Route::any('/data', function (Request $request) {
    return print_r($request);
})->name('data');

Route::view('/home', 'home', ['name' => 'Munna']);

// Route::get('/user/{id}', function (string $id) {
//     return 'user = ' . $id;
// });

// Route::get('/user/{id?}', function (Request $request, string $id = null) {
//     return 'User = ' . $id;
// });

// Route::get('user/{name}', function (string $name) {
//     return 'User = ' . $name;
// })->whereAlpha('name');
// Route::get('user/{name}', function (string $name) {
//     return 'User = ' . $name;
// })->whereAlphaNumeric('name');
// Route::get('user/{name}', function (string $name) {
//     return 'User = ' . $name;
// })->whereIn('name', ['munna','masud']);

Route::get('/user/{id}', function (string $id) {
    return 'User = ' . $id;
});
