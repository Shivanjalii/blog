<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


 
Route::resource('categories', CategoryController::class);

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::resource('tags', TagController::class);

