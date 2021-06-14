<?php

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
    return view('auth.login');
});

Route::get('/index',[App\Http\Controllers\ContactController::class, 'index']);

Route::get('/contacts',[App\Http\Controllers\ContactController::class, 'get']);

Route::post('/createContact',[App\Http\Controllers\ContactController::class, 'create']);

Route::post('/deleteContact',[App\Http\Controllers\ContactController::class, 'delete']);

Route::post('/message',[App\Http\Controllers\MessageController::class, 'handleMessage']);

Route::post('/alert',[App\Http\Controllers\ContactController::class, 'sendOnlineNotification']);

Route::get('/getCurrUser', [App\Http\Controllers\UserController::class, 'getUser']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
