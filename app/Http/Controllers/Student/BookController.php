<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show($id)
{
    $book = Book::findOrFail($id);

    // book status
    $borrow = $book->borrows()
                   ->where('status', 'borrowed')
                   ->latest()
                   ->first();

    return view('books.show', compact('book', 'borrow'));
}

}
