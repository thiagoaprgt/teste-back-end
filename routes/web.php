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
    
    if(empty($_SESSION['user']['id'])) {

        return view('login');  

    }else {
        return view('home'); 
    }

});

Route::post('/loginAuthentication', [Login::class, 'loginAuthentication']);


Route::get('/listar', [Login::class, 'listarUsers']);

Route::get('/newUser', function () {
    return view('newUser');
});



Route::match(['get', 'post'], '/createUser', [Login::class, 'saveUser']);


Route::controller(OrderController::class)->group(function () {

    session_start();

    if(!empty($_SESSION['user']['id'])) {

        Route::match(['get', 'post'], '/deleteUser', [Login::class, 'deleteUser']);

        Route::match(['get', 'post'], '/editUser', [Login::class, 'editUser']);        

    }

    
   
});




