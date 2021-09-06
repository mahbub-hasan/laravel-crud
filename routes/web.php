<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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
Route::get('/',[UserController::class,'loginPage'])->name('user.login');
Route::get('/user/reg',[UserController::class,'registrationPage'])
    ->name('user.registration');
Route::post('/user/registration',[UserController::class,'doRegistration'])
    ->name('user.sign_up');
Route::post('/user/login',[UserController::class,'doLogin'])->name('user.sign_in');

Route::resource('todo',TodoController::class);
