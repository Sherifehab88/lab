<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// books read

Route::get('/',[BookController::class,'index'])->name('books.index');
Route::get('/books',[BookController::class,'index'])->name('books.index');
Route::get('/books/show/{id}',[BookController::class,'show'])->name('books.show');


// books create

Route::get('/books/create',[BookController::class,'create'])->name('books.create');
Route::post('/books/store',[BookController::class,'store'])->name('books.store');

// books update

route::get('/books/edit/{id}', [BookController::class,'edit'])->name('books.edit');
route::post('/books/update{id}', [BookController::class,'update'])->name('books.update');

// books delete

route::get('books/delete/{id}', [BookController::class,'delete'])->name('books.delete');


// categories read

Route::get('/',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/show/{id}',[CategoryController::class,'show'])->name('categories.show');


// categories create

Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');

// categories update

route::get('/categories/edit/{id}', [CategoryController::class,'edit'])->name('categories.edit');
route::post('/categories/update{id}', [CategoryController::class,'update'])->name('categories.update');

// categories delete

route::get('categories/delete/{id}', [CategoryController::class,'delete'])->name('categories.delete');