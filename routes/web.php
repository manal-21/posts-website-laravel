<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserPostController;

Route::get('/', function () {
    return view ('home');
})->name('home');

Route::get('/users/{user:email}/posts', [UserPostController::class, 'index'])->name('user.posts');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'sign']);

Route::post('/logout', [LogoutController::class, 'signOut'])->name('logout');

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::post('/post', [PostController::class, 'store']);
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('posts');

Route::post('/post/{post}/likes', [LikeController::class, 'store'])->name('posts.like');
Route::delete('/post/{post}/likes', [LikeController::class, 'destroy'])->name('posts.like');