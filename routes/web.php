<?php

//use App\Http\Controllers\blogController;

use App\Http\Controllers\ConsultasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsuarioController;

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
    Route::view('/sblog', "sblog")->name('sblog');

    Route::get('login', [LoginController::class, 'Crear'])->name('login');
    Route::post('login', [LoginController::class, 'Validar']);

    Route::get('registro', [RegistroController::class, 'Crear'])->name('registro');
    Route::post('registro', [RegistroController::class, 'Almacenar']);

    Route::get('logout', [LogoutController::class, 'Salir']);

    Route::get('sblog', [PostController::class, 'BuscarPosts'])->name('BuscarPosts');