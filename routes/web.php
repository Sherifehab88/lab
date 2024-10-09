<?php

use App\Http\Controllers\BookController;
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