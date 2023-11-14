<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [RegisterController::class, 'index'])->name("register.index");
Route::post("/register", [RegisterController::class, "store"])->name("register.store");

Route::get("/login", [LoginController::class, 'index'])->name("login");
Route::post("/login", [LoginController::class, 'store']);

Route::get("/muro", [PostController::class, "index"])->name("post.index");
