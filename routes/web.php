<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\BookController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return view('welcome');
});

// Books
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Auth Required
Route::middleware('auth')->group(function () {
    // Dashboard + Profile
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Borrow
    Route::get('/my-borrows', [BorrowController::class, 'index'])->name('borrows.index');
    Route::post('/borrow/{book_id}', [BorrowController::class, 'borrow'])->name('borrow.book');
    Route::post('/return/{book_id}', [BorrowController::class, 'returnBook'])->name('return.book');
    Route::get('/borrowed-books', [BorrowController::class, 'allBorrowedBooks'])
    ->name('borrows.all');

});

require __DIR__.'/auth.php';
