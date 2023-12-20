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

Route::get('/', [\App\Http\Controllers\Post::class,'index'])->name('home');
Route::prefix('/dashboard')->middleware('auth')->group(function (){
    Route::get('/', [\App\Http\Controllers\Dashboard\Index::class,'index'])->name('dashboard')->middleware('auth.admin');
    Route::put('/', [\App\Http\Controllers\Dashboard\Index::class,'update'])->middleware('auth.admin');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/category/{slug}')->name('category');
Route::get('/post/{slug}')->name('post');
require __DIR__.'/auth.php';
