<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home',['title'=>'home']);
});

Route::middleware(['auth'])->group(function(){

    Route::get('/blog', [PostController::class,'showAll'])->name('blog');
    Route::get('/posting',[PostController::class,'posting']);
    Route::post('/postingan',[PostController::class,'postStore']);
});

Route::post('/post/{id}/unlikes',[PostController::class,'unlikePost'])->name('post.unlike');
Route::get('/post/edit/{post}',[PostController::class,'editPost'])->name('post.edit');
Route::put('/post/{post}',[PostController::class,'postUpdate'])->name('post.update');
Route::post('/post/{id}/likes',[PostController::class,'likePost'])->name('post.like');
Route::delete('/delete/{post}',[PostController::class,'deletePost']);
Route::get('/author/{author}',[PostController::class,'showUser']);
Route::get('/post/{post}',[PostController::class,'showSinglePosts'])->name('SinglePost');
Route::get('/category/{category}',[PostController::class,'showCategory']);
Route::post('/post/{postId}/comment',[PostController::class,'postComment'])->name('comment.store');
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::get('/registrasi',[AuthController::class,'showRegister'])->name('register');
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/submit',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

