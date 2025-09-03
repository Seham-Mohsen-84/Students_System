@extends('layouts.admin')

@section('title','Books')
@section('page-title','Books')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Books List</h3>
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Book
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('admin.books.edit',$book->id) }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.books.destroy',$book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this book?')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No books found</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $books->links() }}
    </div>
@endsection
