<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BookController::class, 'index'])->name('home');
Route::post('/book/add', [BookController::class, 'create'])->name('create');
Route::get('/book', [BookController::class, 'show'])->name('show');
Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('edit');
Route::patch('/book/{id}', [BookController::class, 'update'])->name('update');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('delete');
