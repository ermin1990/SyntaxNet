<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdmiEditorCheckMiddleware;
use Illuminate\Support\Facades\Route;




//PUBLIC ROUTING
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//ADMIN ROUTING



//EDITOR ROUTING

//---------------------------
Route::controller(PostController::class)->prefix("/post")
    ->name('post.')
    ->middleware('auth', AdmiEditorCheckMiddleware::class)
    ->group(function () {
        Route::post("/store", 'store')->name('store');
        Route::get("/{slug}", 'show')->name('show');
        Route::get("/edit/{id}", 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('logout', [ProfileController::class, 'logout'])->name('logout');
});

require __DIR__.'/auth.php';
