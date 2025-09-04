@extends('layouts.student')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h1 class="h4 mb-4 text-primary">All Books</h1>
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4 mb-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            {{-- Book Title --}}
                            <h5 class="card-title text-dark">{{ $book->title }}</h5>

                            {{-- Book Author --}}
                            <p class="card-text text-muted">Author: {{ $book->author }}</p>

                            {{-- Book Status --}}
                            @php
                                $borrow = $book->borrows()->where('status', 'borrowed')->latest()->first();
                            @endphp
                            @if($borrow)
                                <p class="mb-2"><strong>Status:</strong> Borrowed</p>
                            @else
                                <p class="mb-2"><strong>Status:</strong> Available</p>
                            @endif

                            {{-- View Details Button --}}
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
