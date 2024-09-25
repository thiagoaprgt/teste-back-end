<?php

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

use App\Http\Controllers\Login;

Route::get('/', function () {
    return view('login');
});

Route::post('/loginAuthentication', [Login::class, 'loginAuthentication']);


Route::get('/listar', [Login::class, 'listarUsers']);

Route::get('/newUser', function () {
    return view('newUser');
});

// Route::post('/createUser', [Login::class, 'saveUser']);

Route::match(['get', 'post'], '/createUser', [Login::class, 'saveUser']);

Route::match(['get', 'post'], '/deleteUser', [Login::class, 'deleteUser']);

Route::match(['get', 'post'], '/editUser', [Login::class, 'editUser']);
