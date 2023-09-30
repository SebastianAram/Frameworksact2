<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;


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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostsController::class, 'index'])->name('posts');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts');
    Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts-edit');
    Route::patch('/posts/{id}', [PostsController::class, 'update'])->name('posts-update');
    Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts-destroy');
    Route::resource('categories', CategoriesController::class);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
