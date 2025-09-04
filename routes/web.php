<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

use App\Http\Controllers\Student\BookController as StudentBookController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware('isAdmin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [AdminBookController::class, 'dashboard'])->name('dashboard');
        Route::resource('books', AdminBookController::class);
        Route::resource('users', AdminUserController::class)->only(['index','show']);
        Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::get('students/search', [AdminUserController::class, 'search'])->name('students.search');
    });
});


Route::middleware(['auth', 'isStudent'])->prefix('student')->group(function () {
    // Dashboard + Profile
    Route::get('dashboard', [StudentProfileController::class, 'dashboard'])->name('student.dashboard');
    Route::get('profile', [StudentProfileController::class, 'edit'])->name('student.profile.edit');
    Route::patch('profile/update', [StudentProfileController::class, 'update'])->name('student.profile.update');
    Route::delete('profile/delete', [StudentProfileController::class, 'destroy'])->name('student.profile.destroy');

    // Books
    Route::get('books', [StudentBookController::class, 'index'])->name('books.index');
    Route::get('books/{id}', [StudentBookController::class, 'show'])->name('books.show');

    // Borrow
    Route::get('my-borrows', [BorrowController::class, 'index'])->name('borrows.index');
    Route::post('borrow/{book_id}', [BorrowController::class, 'borrow'])->name('borrow.book');
    Route::post('return/{book_id}', [BorrowController::class, 'returnBook'])->name('return.book');
    Route::get('borrowed-books', [BorrowController::class, 'allBorrowedBooks'])->name('borrows.all');
});


require __DIR__.'/auth.php';
