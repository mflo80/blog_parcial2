<?php

use App\Http\Controllers\CalificacionController;
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
        Route::get('sblog', 'Index')->name('sblog');
        Route::get('sblog-mes-{id}', 'ShowPostPorMes')->name('sblog-mes');
        Route::get('sblog-post-{id}', 'ShowPost')->name('post');
        Route::get('sblog-calificar-{id}', 'ShowPostCalificar')->name('calificar');
        Route::get('sblog-crear', 'Create')->middleware('auth')->name('crear');
        Route::post('sblog-crear', 'Store');
        Route::get('sblog-editar-{id}', 'Edit')->middleware('auth')->name('editar');
        Route::put('sblog-editar-{id}', 'Update');
        Route::get('sblog-eliminar-{id}', 'Destroy')->middleware('auth')->name('eliminar');
    });

    Route::put('sblog-calificar-{id}', [CalificacionController::class, 'Store']);

    Route::controller(LoginController::class)->group(function () {
        Route::get('sblog-login', 'Index')->name('login');
        Route::post('sblog-login', 'Validar');
    });

    Route::controller(RegistroController::class)->group(function () {
        Route::get('sblog-registro', 'Index')->name('registro');
        Route::post('sblog-registro', 'Store');
    });

    Route::get('sblog-logout', [LogoutController::class, 'Salir'])->name('logout');



    