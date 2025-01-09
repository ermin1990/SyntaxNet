<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\AdmiEditorCheckMiddleware;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;


//ADMIN ROUTING

Route::controller(AdminController::class)->prefix("/admin")
    ->name('admin.')
    ->middleware(['auth', AdminCheckMiddleware::class])
    ->group(function () {
        Route::get('/', 'index')->name('index');

        Route::group(['prefix' => '/users'], function () {
            Route::get('/', 'users')->name('users.index');
            Route::get('/edit/{user}', 'useredit')->name('users.edit');
            Route::put('/update/{user}', 'userupdate')->name('users.update');
        });

        Route::group(['prefix' => '/posts'], function () {
            Route::get('/', 'posts')->name('posts.index');
            Route::get('/edit/{post}', 'postedit')->name('post.edit');
            Route::put('/update/{post}', 'postupdate')->name('post.update');
            Route::get('/delete/{post}', 'postdelete')->name('post.delete');
        });

        Route::group(['prefix' => '/page'], function () {
            Route::get('/', 'pages')->name('page.index');
            Route::get('/edit/{page}', 'pageedit')->name('page.edit');
            Route::put('/update/{page}', 'pageupdate')->name('page.update');
            Route::get('/delete/{page}', 'pagedelete')->name('page.delete');
        });

        Route::group(['prefix' => '/tag'], function () {
            Route::get('/', 'tags')->name('tag.index');
            Route::get('/edit/{tag}', 'tagedit')->name('tag.edit');
            Route::put('/update/{tag}', 'tagupdate')->name('tag.update');
            Route::get('/delete/{tag}', 'tagdelete')->name('tag.delete');
            Route::view('/addnew', 'admin.tags.add')->name('tag.addnew');
            Route::post('/store', 'tagstore')->name('tag.store');
        });


        Route::group(['prefix' => '/category'], function () {
            Route::get('/', 'categories')->name('category.index');
            Route::get('/edit/{category}', 'categoryedit')->name('category.edit');
            Route::put('/update/{category}', 'categoryupdate')->name('category.update');
            Route::get('/delete/{category}', 'categorydelete')->name('category.delete');
            Route::view('/addnew', 'admin.categories.add')->name('category.addnew');
            Route::post('/store', 'categorystore')->name('category.store');
        });

    });


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
Route::view('/about', 'about')->name('about');
Route::get('/tag/{tag}', [TagController::class, 'index'])->name('tag.index');

Route::get('/category/{category}', [PostCategoryController::class, 'index'])->name('category.index');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/page', [PageController::class, 'index'])->name('page.index');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

require __DIR__ . '/auth.php';
