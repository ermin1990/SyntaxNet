<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\AdmiEditorCheckMiddleware;
use Illuminate\Support\Facades\Route;





//ADMIN ROUTING



//EDITOR ROUTING

//---------------------------
Route::controller(PostController::class)->prefix("/post")
    ->name('post.')
    ->middleware(['auth', AdmiEditorCheckMiddleware::class])
    ->group(function () {
        Route::post("/store", 'store')->name('store');
        Route::get("/edit/{id}", 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

Route::controller(CommentController::class)->prefix("/comment")
    ->name('comment.')
    ->middleware(['auth', AdmiEditorCheckMiddleware::class])
    ->group(function () {
        Route::post("/store", 'store')->name('store');
        Route::get("/destroy/{comment}", 'destroy')->name('destroy');
    });

Route::controller(PageController::class)->prefix("/page")
    ->name('page.')
    ->middleware(['auth', AdmiEditorCheckMiddleware::class])
    ->group(function () {
        Route::view("/addnew", 'page.add')->name('addnew');
        Route::post("/store", 'store')->name('store');
        Route::get("/edit/{id}", 'edit')->name('edit');
        Route::put("/update/{page}", 'update')->name('update');
        Route::get("/delete/{page}", 'destroy')->name('delete');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('logout', [ProfileController::class, 'logout'])->name('logout');


});

//PUBLIC ROUTING
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tag/{tag}', [TagController::class, 'index'])->name('tag.index');

Route::get('/category/{category}', [PostCategoryController::class, 'index'])->name('category.index');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/pages',[PageController::class, 'index'])->name('page.index');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

require __DIR__.'/auth.php';
