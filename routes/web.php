<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "nama" => "mbuhkeder",
        "email" => "mbuh@keder.com",
        "img" => "Icon-revice.png"
    ]);
});

// Route::get('/register', function () {
//     return view('register');
// });

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'post']);
// Route::view('/verif','verif');

// Route::view('/admin_login','/admin/admin_login');

// Route::view('/admin_index','admin.index');

