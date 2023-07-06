<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\BlogController;

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

    Route::get('login', [LoginController::class, 'Index']);
    Route::post('login', [LoginController::class, 'Validar']);

    Route::get('registro', [RegistroController::class, 'Index']);
    Route::post('registro', [RegistroController::class, 'Almacenar']);

    Route::get('logout', [LogoutController::class, 'Salir']);

    Route::get('sblog', [BlogController::class, 'BuscarPost']);