<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\Dashboard\Post::class,'index'])->name('home');
Route::prefix('/dashboard')->middleware('auth')->group(function (){
    Route::get('/', [\App\Http\Controllers\Dashboard\Index::class,'index'])->name('dashboard')->middleware('auth.admin');
    Route::put('/', [\App\Http\Controllers\Dashboard\Index::class,'update'])->middleware('auth.admin');
    Route::resource('category',\App\Http\Controllers\Dashboard\Categories::class)
        ->only(['create','store','destroy'])
        ->middleware('auth.admin');
    Route::resource('post',\App\Http\Controllers\Dashboard\Post::class)
        ->only(['create','store','destroy']);;
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/category/{slug}',[\App\Http\Controllers\Dashboard\Categories::class,'show'])->name('category');
Route::get('/post/{slug}',[\App\Http\Controllers\Dashboard\Post::class,'show'])->name('post');
Route::post('/post/{post}/comment',[\App\Http\Controllers\Dashboard\Post::class,'comment'])->name('comment')->middleware('auth');
require __DIR__.'/auth.php';
