<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;



// Web routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('/allposts', [PublicController::class, 'index'])->name('posts.feed');
Route::middleware(['auth:sanctum'])->group(function(){
    Route::resource('posts', PostController::class)->except('show');
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/profile/edit', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
    Route::put('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
    Route::get('/homepage', function() {
        return view('temp.homepage');
    });
    Route::get('/postform', function() {
        return view('temp.postform');
    });
    Route::get('/postlist', function() {
        return view('temp.postlist');
    });
    Route::get('/posts', [PostController::class, 'index'])->name('post.index');

    Route::get('/movies', 'App\Http\Controllers\MovieController@index');
    Route::post('/user/{user}/follow', 'App\Http\Controllers\UserController@follow')->name('user.follow');
    Route::post('/user/{user}/unfollow', 'App\Http\Controllers\UserController@unfollow')->name('user.unfollow');
    Route::post('/post/{post}/like', 'App\Http\Controllers\PostController@like')->name('post.like');
    Route::post('/post/{post}/comment', 'App\Http\Controllers\PostController@comment')->name('post.comment');
    Route::get('/users/search', 'App\Http\Controllers\UserController@search')->name('user.search');
    Route::get('/users/{user}', 'App\Http\Controllers\UserController@profile')->name('user.profile');
    Route::get('/gifts', 'App\Http\Controllers\GiftController@index')->name('gifts.index');
});
require __DIR__.'/auth.php';