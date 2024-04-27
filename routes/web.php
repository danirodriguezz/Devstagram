<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
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
Route::get('/', HomeController::class)->name('home.index');

# Autenticacion y registro del usuario
Route::get('/register', [RegisterController::class, 'index'])->name('crear-cuenta.index');
Route::post('/register', [RegisterController::class, 'store'])->name('crear-cuenta.store');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Ruta para editar el perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');


// Subida de post de los usuarios
Route::get("/post/create", [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');

// Subida de Imagenes de Posts
Route::post('/imagenes', [ImageController::class, 'store'])->name('imagenes.store');

// Comentar un Post
Route::post("/{user:username}/posts/{post}", [ComentarioController::class, 'store'])->name('comentario.store');

// Eliminar posts
Route::delete("/posts/{post}", [PostController::class, 'destroy'])->name('post.destroy');

// Siguiendo a usuarios
Route::post("/{user:username}/follow", [FollowerController::class, 'store'])->name('users.follow');
Route::delete("/{user:username}/unfollow", [FollowerController::class, 'destroy'])->name('users.unfollow');

// Muro de los usuarios
Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
// Mostrar un post de un usuario
Route::get("/{user:username}/posts/{post}", [PostController::class, 'show'])->name('post.show');

