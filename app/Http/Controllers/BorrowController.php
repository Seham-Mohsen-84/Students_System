<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Auth::user()->borrows()->with('book')->get();
        return view('borrows.index', compact('borrows'));
    }

    public function borrow($book_id)
{
    $book = Book::findOrFail($book_id);

    // Check if this book is already borrowed by ANY student
    $alreadyBorrowed = Borrow::where('book_id', $book->id)
        ->where('status', 'borrowed')
        ->exists();

    if ($alreadyBorrowed) {
        return redirect()->back()->with('error', 'This book is already borrowed by another student.');
    }

    // Create borrow record
    Borrow::create([
        'user_id' => Auth::id(),
        'book_id' => $book->id,
        'borrowed_at' => Carbon::now(),
        'due_date' => Carbon::now()->addDays(7),
        'status' => 'borrowed',
    ]);

    return redirect()->route('borrows.index')->with('success', 'Book borrowed successfully.');
}


    public function returnBook($book_id)
    {
        $borrow = Borrow::where('user_id', Auth::id())
                        ->where('book_id', $book_id)
                        ->where('status', 'borrowed')
                        ->firstOrFail();

        $borrow->update([
            'status' => 'returned',
            'returned_at' => Carbon::now(),
        ]);

        return redirect()->route('borrows.index')->with('success', 'Book returned successfully.');
    }
        public function allBorrowedBooks()
    {

        $borrows = Borrow::with('book', 'user')
                    ->where('status', 'borrowed')
                    ->latest()
                    ->get();

        return view('borrows.all', compact('borrows'));
    }


}
