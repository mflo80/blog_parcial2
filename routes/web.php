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

Route::get('login', [LoginController::class, 'Crear'])->name('login');
Route::post('login', [LoginController::class, 'Almacenar']);

Route::get('registro', [RegistroController::class, 'Crear']);
Route::post('registro', [RegistroController::class, 'Almacenar']);

Route::get('logout', [LogoutController::class, 'Salir']);