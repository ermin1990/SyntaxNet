<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




//PUBLIC ROUTING
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//ADMIN ROUTING



//EDITOR ROUTING

//---------------------------
Route::controller(PostController::class)->prefix("/post")
    ->name('post.')
    ->group(function () {
        Route::post("/store", 'store')->name('store');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('logout', [ProfileController::class, 'logout'])->name('logout');
});

require __DIR__.'/auth.php';
