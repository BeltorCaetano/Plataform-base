<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\userController;
use App\Http\Controllers\storeController;
use App\Http\Controllers\ConvertController;

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
    return view('user.signin');
});
Route::get('/Main', function () {
    return view('stores');
});
Route::get('/Upload', function () {
    return view('loja.continente');
});
Route::get('/converter', function () {
    return view('converter');
});
Route::get('/test', function () {
    return view('test');
});
Route::post('/signin', [userController::class,'authenticate']);
Route::post('/signup', [userController::class,'store']);
Route::get('/register', [userController::class,'create']);
Route::get('/login', [userController::class,'auth']);
Route::get('/send-mail', [MailController::class, 'index']);
