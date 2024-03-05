<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

# Landing page
Route::get('/', function () {
    return view('principal');
});

# Autenticacion y registro del usuario
Route::get('/register', [RegisterController::class, 'index'])->name('crear-cuenta.index');
Route::post('/register', [RegisterController::class, 'store'])->name('crear-cuenta.store');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

# Rutas privadas
Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
Route::get("/posts/create", [PostController::class, 'create'])->name('post.create');