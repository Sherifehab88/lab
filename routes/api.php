<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBookController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//books read 
Route::get('/books', [ApiBookController::class, 'index']);
Route::get('/books/show/{id}', [ApiBookController::class, 'show']);

//books create
Route::POST('/books/store', [ApiBookController::class, 'store']);

// books update
route::post('/books/update/{id}', [ApiBookController::class,'update']);

// book delete
route::get('/books/delete/{id}', [ApiBookController::class,'delete']);