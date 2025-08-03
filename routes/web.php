<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/top-authors', [AuthorController::class, 'topAuthors'])->name('authors.top');
Route::get('/rate', [RatingController::class, 'create'])->name('ratings.create');
Route::post('/rate', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/books-by-author', [RatingController::class, 'getBooksByAuthor'])->name('books.by-author');
