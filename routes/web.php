<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'HomeController@indexx')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/books', 'HomeController@index1')->name('books');
Route::get('/authors', 'HomeController@index2')->name('authors');
Route::get('/genres', 'HomeController@index3')->name('genres');

Route::get('/resultbooks', 'HomeController@index4')->name('booksearch');

Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/home',[AdminController::class,'index'])->name('admin.home');
    Route::get('/show/{id}',[AdminController::class,'show'])->name('admin.profile');
    Route::prefix('category')->middleware('category')->group(function(){
        Route::get('/index',[CategoryController::class,'index'])->name('admin.category.index');
        Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/show/{id}',[CategoryController::class,'show'])->name('admin.category.show');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::put('/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::delete('/delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.delete');
    });
    Route::prefix('book')->middleware('book')->group(function(){
        Route::get('/index',[BookController::class,'index'])->name('admin.book.index');
        Route::get('/create',[BookController::class,'create'])->name('admin.book.create');
        Route::post('/store',[BookController::class,'store'])->name('admin.book.store');
        Route::get('/category/{id}',[BookController::class,'show'])->name('admin.book.show');
        Route::get('/edit/{id}',[BookController::class,'edit'])->name('admin.book.edit');
        Route::put('/update/{id}',[BookController::class,'update'])->name('admin.book.update');
        Route::delete('/delete/{id}',[BookController::class,'destroy'])->name('admin.book.delete');
    });

    Route::prefix('author')->middleware('author')->group(function(){
        Route::get('/index',[AuthorController::class,'index'])->name('admin.author.index');
        Route::get('/create',[AuthorController::class,'create'])->name('admin.author.create');
        Route::post('/store',[AuthorController::class,'store'])->name('admin.author.store');
        Route::get('/category/{id}',[AuthorController::class,'show'])->name('admin.author.show');
        Route::get('/edit/{id}',[AuthorController::class,'edit'])->name('admin.author.edit');
        Route::put('/update/{id}',[AuthorController::class,'update'])->name('admin.author.update');
        Route::delete('/delete/{id}',[AuthorController::class,'destroy'])->name('admin.author.delete');
    });

});


Route::prefix('user')->middleware('user')->group(function(){
    Route::get('/home',[UserController::class,'index'])->name('home');
    Route::get('/show/{id}',[UserController::class,'show'])->name('user.profile');

    
    Route::get('/addfavorites/{id}',[BookController::class,'addfavorites'])->name('favorites');
    Route::delete('/deletefavorites/{id}',[BookController::class,'deletefavorites'])->name('deletefavorite');
    
Route::get('/favorites',[BookController::class,'showFavorites'])->name('favoriteslist');

    Route::prefix('review')->middleware('review')->group(function(){
        Route::get('/index',[ReviewController::class,'index'])->name('user.review.index');
        Route::get('/create',[ReviewController::class,'create'])->name('user.review.create');
        Route::post('/store',[ReviewController::class,'store'])->name('user.review.store');
        Route::post('/replystore',[ReviewController::class,'replystore'])->name('user.review.stor');
        Route::get('/category/{id}',[ReviewController::class,'show'])->name('user.review.show');
        Route::get('/reply/{id})',[ReviewController::class,'show2'])->name('user.review.reply');
        Route::get('/edit/{id}',[ReviewController::class,'edit'])->name('user.review.edit');
        Route::put('/update/{id}',[ReviewController::class,'update'])->name('user.review.update');
        Route::delete('/delete/{id}',[ReviewController::class,'destroy'])->name('user.review.delete');
    });

});