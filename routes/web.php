<?php


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
    Route::get('/sblog', [PostController::class, 'Index']);

    Route::get('sblog-login', [LoginController::class, 'Index']);
    Route::post('sblog-login', [LoginController::class, 'Validar']);

    Route::get('sblog-registro', [RegistroController::class, 'Index']);
    Route::post('sblog-registro', [RegistroController::class, 'Store']);

    Route::get('sblog-logout', [LogoutController::class, 'Salir']);

    Route::get('sblog-post-{id}', [PostController::class, 'Show']);

    /*Route::get('sblog', [BlogController::class, 'BuscarPosts']);
    Route::get('post', [PostController::class, 'BuscarPost']);*/