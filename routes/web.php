<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;



Route::get('/',[HomeController::class,'index']);

Route::get('/logout',[HomeController::class,'logout']);

Route::get('admin/dashboard');

Route::get('/dashboard', [HomeController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth', [HomeController::class, 'auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/create',[PostController::class,'create'])->middleware(['auth', 'verified']);

Route::get('fetchTotalUsers',[HomeController::class,'fetchTotalUsers'])->name('fetchTotalUsers');

Route::post('/store',[PostController::class,'store'])->name('store');

Route::get('/post/{id}',[PostController::class,'show']); //always keep wildcards below to avoid overwriting other

Route::get('/search', [HomeController::class, 'search'])->name('search');
require __DIR__.'/auth.php';
