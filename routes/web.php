<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('posts/{post}', [\App\Http\Controllers\SiteController::class, 'post'])->name('post');
Route::get('category/category}', [\App\Http\Controllers\SiteController::class, 'category'])->name('category');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'admin']);

// Route::resource('admin/users',UsersController::class)->middleware(['auth', 'admin']);
// Route::resource('admin/categories',UsersController::class)->middleware(['auth', 'admin']);
// Route::resource('admin/posts',UsersController::class)->middleware(['auth', 'admin']);

Route::middleware(['auth', 'admin'])->prefix('/admin')->group(function () {
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::resource('categories', 'App\Http\Controllers\CategoryController');
    Route::resource('posts', 'App\Http\Controllers\PostController');
});
