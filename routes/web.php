<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome', [
            'totalUsers' => \App\Models\User::all()->count(),
            'totalPosts' => \App\Models\Post::all()->count(),
        ]);
    })->name('home');

    Route::get('/users', [UserController::class, 'index'])->name('user');
    Route::get('/users/{user}/posts', [UserController::class, 'userPosts'])->name('user.posts');

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/post/{post}', [PostController::class, 'view'])->name('post.view');
    Route::get('/create-post', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}/delete', [PostController::class, 'destroy'])->name('post.delete');
});

