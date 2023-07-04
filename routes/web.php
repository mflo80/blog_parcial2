<?php

//use App\Http\Controllers\blogController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LogoutController;

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

Route::view('/', "index")->name('index');
Route::view('/home', "home")->name('home');
Route::view('/sblog', "sblog")->middleware('auth')->name('sblog');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('customLogin', [LoginController::class, 'customLogin'])->name('customLogin'); 
Route::get('registro', [RegistroController::class, 'registro'])->name('registro');
Route::post('customRegistro', [RegistroController::class, 'customRegistro'])->name('customRegistro'); 
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');