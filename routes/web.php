<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;

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

Route::middleware(['auth'])->group(function () {
    Route::resource('/post', 'App\Http\Controllers\PostController');
    Route::resource('/comment', 'App\Http\Controllers\CommentController');
    Route::resource('/user', 'App\Http\Controllers\Auth\RegisteredUserController');
    Route::get('/', [PostController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';