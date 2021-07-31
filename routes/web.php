<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/category', CategoryController::class);
Route::resource('/books', BookController::class)->except('show');
Route::get('books/{book}-{slug}', [BookController::class, 'show'])->name('books.show');
Route::get('books/{book}-{slug}/files', [BookController::class, 'fileview'])->name('files.view');
