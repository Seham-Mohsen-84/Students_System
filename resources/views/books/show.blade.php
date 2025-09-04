@extends('layouts.student')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="h4 text-primary">{{ $book->title }}</h2>
        <p class="text-muted">Author: {{ $book->author }}</p>

        {{-- book status--}}
        @if($borrow)
            <p class="text-orange-600 mb-1">
                <strong>Status:</strong> Borrowed
            </p>
            <p class="text-purple-600 mb-3">
                <strong>Return Due:</strong> {{ $borrow->due_date }}
            </p>

            {{-- return button --}}
            @if($borrow->user_id == Auth::id())
                <form action="{{ route('return.book', $book->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-danger">Return Book</button>
                </form>
            @endif
        @else
            <p class="text-success mb-3">
                <strong>Status:</strong> Available
            </p>

            {{-- borrow button --}}
            @auth
                <form action="{{ route('borrow.book', $book->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-success">Borrow Book</button>
                </form>
            @endauth
        @endif
    </div>
</div>
@endsection
