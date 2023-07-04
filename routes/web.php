<?php

//use App\Http\Controllers\blogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;

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
Route::view('/login', "login")->name('login');
Route::view('/registro', "registro")->name('registro');
Route::view('/sblog', "sblog")->middleware('auth')->name('sblog');
