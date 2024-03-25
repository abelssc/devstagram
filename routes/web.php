<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;

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
Route::get('/', HomeController::class)->name('home');
// Route::get('/', view('home'))->name('home');
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');

Route::post('posts/{post}/likes',[LikeController::class,'store'])->name('likes.store');
Route::delete('posts/{post}/likes',[LikeController::class,'destroy'])->name('likes.destroy');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

//FOLLOWERS
Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('follow.store');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('follow.destroy');

//RUTAS PERFIL
Route::get('/{user:username}/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('/{user:username}/edit',[ProfileController::class,'update'])->name('profile.update');
Route::get('/{user:username}',[ProfileController::class, 'index'])->name('profile.index');
