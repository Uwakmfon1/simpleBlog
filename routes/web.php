<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;



Route::get('/',[HomeController::class,'index'])->middleware('checkSession')->name('index');

Route::get('/logout',[HomeController::class,'logout']);

Route::get('/dashboard', [HomeController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth', [HomeController::class, 'auth'])->middleware(['auth','verified'])->name('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/create',[PostController::class,'create'])->middleware(['auth', 'verified'])->name('create');

Route::get('fetchTotalUsers',[HomeController::class,'fetchTotalUsers'])->name('fetchTotalUsers');

Route::resource('/store',PostController::class);//->name('store');

Route::get('/post/{id}',[PostController::class,'show']); //always keep wildcards below to avoid overwriting other

Route::get('/search', [HomeController::class, 'search'])->name('search');
require __DIR__.'/auth.php';
