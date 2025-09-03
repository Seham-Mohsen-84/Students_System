{{-- resources/views/admin/books/show.blade.php --}}
@extends('layouts.admin')

@section('title', 'Book Details')

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">📚 Book Details</h4>

                    <div class="mb-3">
                        <strong>Title:</strong>
                        <p>{{ $book->title }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Author:</strong>
                        <p>{{ $book->author }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Created At:</strong>
                        <p>{{ $book->created_at->format('d M, Y h:i A') }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary btn-sm">
                            ← Back
                        </a>

                        <div>
                            <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning btn-sm">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">
                                    🗑 Delete
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
