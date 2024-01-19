<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

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
    return view('home');
})->name('home');
// Route::get('/', view('home'))->name('home');
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/{user:username}',[PostController::class, 'index'])->name('profile');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');