<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\authController;

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
    return view('login');
});

Route::get('/register',function(){
    return view('register');
});

Route::post('/actionlogin',[authController::class,'actionlogin']);
Route::post('/actionregister',[authController::class, 'actionregister']);
Route::post('/updateNote/{id}',[noteController::class,'updateNote']);
Route::post('/deleteNote/{id}',[noteController::class,'deleteNote']);

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();

    // ...
});

