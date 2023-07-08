<?php

use App\Http\Controllers\CrearPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;

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

    Route::controller(PostController::class)->group(function () {
        Route::get('sblog', 'Index');
        Route::get('sblog-post-{id}', 'Show');
        Route::get('sblog-crear', 'Create');
        Route::post('sblog-crear', 'Store');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('sblog-login', 'Index');
        Route::post('sblog-login', 'Validar');
    });

    Route::controller(RegistroController::class)->group(function () {
        Route::get('sblog-registro', 'Index');
        Route::post('sblog-registro', 'Store');
    });

    Route::get('sblog-logout', [LogoutController::class, 'Salir']);



    