<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController as PC;


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
});

Auth::routes();

Route::get('/posts', [PC::class, 'index'])->name('posts.index');
Route::post('/posts/toggleFavorite/{post}', [PC::class, 'toggleFavorite'])->name('posts.toggleFavorite');
Route::middleware(['auth'])->group(function () {
Route::get('/posts/create', [PC::class, 'create'])->name('posts.create');
Route::post('/posts', [PC::class, 'store'])->name('posts.store');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


