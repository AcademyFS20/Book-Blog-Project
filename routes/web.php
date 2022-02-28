<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ArticleController;
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

// articles:
Route::get('/articles',[ArticleController::class,'showArticles'])->name('showarticles');
Route::get('/article/{id}/{slug}',[ArticleController::class,'showArticle'])->name('showarticle');




Route::get('/resultbooks', 'HomeController@index4')->name('booksearch');


Route::get('/categorybooks/{category_type}', 'HomeController@index5')->name('categorybooks');

Route::get('/authorbooks/{author_name}', 'HomeController@index6')->name('authorbooks');


Route::get('newsletter','NewsletterController@create')->name('newsletter');
Route::post('newsletter/store','NewsletterController@store')->name('newsletter');


Route::prefix('admin')->middleware('admin')->group(function(){
    
    Route::get('/edit/{id}',[AdminController::class,'edit'])->name('admin.profile.edit');
    Route::put('/update/{id}',[AdminController::class,'update'])->name('admin.profile.update');




    Route::get('/home',[AdminController::class,'index'])->name('admin.home');
    Route::get('/show/{id}',[AdminController::class,'show'])->name('admin.profile');
    Route::prefix('category')->middleware('category')->group(function(){
        Route::get('/index',[CategoryController::class,'index'])->name('admin.category.index');
        Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/show/{id}/{slug}',[CategoryController::class,'show'])->name('admin.category.show');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::put('/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::delete('/delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.delete');
    });
    Route::prefix('book')->middleware('book')->group(function(){
        Route::get('/index',[BookController::class,'index'])->name('admin.book.index');
        Route::get('/create',[BookController::class,'create'])->name('admin.book.create');
        Route::post('/store',[BookController::class,'store'])->name('admin.book.store');
        Route::get('/book/{id}',[BookController::class,'show'])->name('admin.book.show');
        Route::get('/edit/{id}',[BookController::class,'edit'])->name('admin.book.edit');
        Route::put('/update/{id}',[BookController::class,'update'])->name('admin.book.update');
        Route::delete('/delete/{id}',[BookController::class,'destroy'])->name('admin.book.delete');
    });

    Route::prefix('author')->middleware('author')->group(function(){
        Route::get('/index',[AuthorController::class,'index'])->name('admin.author.index');
        Route::get('/create',[AuthorController::class,'create'])->name('admin.author.create');
        Route::post('/store',[AuthorController::class,'store'])->name('admin.author.store');
        Route::get('/author/{id}/{slug}',[AuthorController::class,'show'])->name('admin.author.show');
        Route::get('/edit/{id}',[AuthorController::class,'edit'])->name('admin.author.edit');
        Route::put('/update/{id}',[AuthorController::class,'update'])->name('admin.author.update');
        Route::delete('/delete/{id}',[AuthorController::class,'destroy'])->name('admin.author.delete');
    });

    Route::prefix('article')->middleware('article')->group(function(){
        Route::get('/index',[ArticleController::class,'index'])->name('admin.article.index');
        Route::get('/create',[ArticleController::class,'create'])->name('admin.article.create');
        Route::post('/store',[ArticleController::class,'store'])->name('admin.article.store');
        Route::get('/article/{id}/{slug}',[ArticleController::class,'show'])->name('admin.article.show');
        Route::get('/edit/{id}',[ArticleController::class,'edit'])->name('admin.article.edit');
        Route::put('/update/{id}',[ArticleController::class,'update'])->name('admin.article.update');
        Route::delete('/delete/{id}',[ArticleController::class,'destroy'])->name('admin.article.delete');
    });

});



Route::get('/',[UserController::class,'indexing'])->name('welcome');
Route::prefix('user')->middleware('user')->group(function(){
    Route::get('/home',[UserController::class,'index'])->name('home');
    Route::get('/show/{id}',[UserController::class,'show'])->name('user.profile');
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('user.profile.edit');
    Route::put('/update/{id}',[UserController::class,'update'])->name('user.profile.update');
    

    
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