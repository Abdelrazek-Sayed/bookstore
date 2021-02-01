<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\catController;

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


// book  
Route::get('/books',[BookController::class,'index']);
Route::get('/books/show/{id}',[BookController::class,'show']);
Route::get('books/search/{keyword}',[BookController::class,'search']);


// cat  
Route::get('/cats',[catController::class,'index']);
Route::get('/cats/show/{id}',[catController::class,'show']);


Route::middleware('auth')->group(function () {


    Route::get('books/create',[BookController::class,'create']);
    Route::post('books/store',[BookController::class,'store']);
    Route::get('books/edit/{id}',[BookController::class,'edit']);
    Route::post('books/update/{id}',[BookController::class,'update']);
    Route::get('books/delete/{id}',[BookController::class,'delete'])->middleware('admin');
    
    Route::get('cats/create',[catController::class,'create']);
    Route::post('cats/store',[catController::class,'store']);
    Route::get('cats/edit/{id}',[catController::class,'edit']);
    Route::post('cats/update/{id}',[catController::class,'update']);
    Route::get('cats/delete/{id}',[catController::class,'delete'])->middleware('admin');
});