<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\OneController;
use App\Models\User;
use App\Models\Post;

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
})  ;
// Route::redirect('/','/home',392);
// Route::get('/home', function () {
//     return view('home');
// });
// Route::match(['post', 'put'], '/data', function (Request $data) {
//     return $data;
// })->name('data');
// Route::any('/data', function (Request $request) {
//     return print_r($request);
// })->name('data');

// Route::view('/home', 'home', ['name' => 'Munna']);

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

// Route::get('/user/{id}', function (Request $request,string $id) {
//     if ($request->route()->named('user')) {
//         return 'User = ' . $id . $_GET['name'] . 'Yes This is named route';
//     } 
    
// })->name('user');

// Route::middleware('web')->group(function() {
//     Route::get('/user/some', function () {
//         // bal chall heda
//     });
// });

// Route::controller(OneController::class)->group(function () {
//     Route::get('/users/some', 'show');
//     Route::post('/user/blabla', function () {
//         //whatever you want
//     });
// });

// Route::get('/user/{user:name}',  [OneController::class, 'show']);

// Route::get('/user/{post:name}/{user:name}', function (Post $post, User $user) {
//     return $post;
// });

// Route::get('/user/{user}', [OneController::class, 'show'])
//                         ->missing(function (Request $request) {

//                             return Redirect::route('data');
//                         });


// Route::get('/user/{user}', [OneController::class, 'show']);
Route::get('/user/{user}', [OneController::class, 'show']);

Route::fallback(function () {
    return 'ball';
});



