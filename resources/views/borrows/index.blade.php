@extends('layouts.student')

@section('content')
    <ul class="list-group mt-3">
        @foreach($borrows as $borrow)
            <li class="list-group-item">
                <strong>{{ $borrow->book->title }}</strong><br>
                <small>
                    Borrowed: {{ $borrow->borrowed_at }} <br>
                    Due: {{ $borrow->due_date }} <br>
                    Status: <span class="badge bg-info text-dark">{{ ucfirst($borrow->status) }}</span>
                </small>

                {{-- Return button only for the user who borrowed the book --}}
                @if($borrow->user_id == Auth::id() && $borrow->status == 'borrowed')
                    <form action="{{ route('return.book', $borrow->book_id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Return Book</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

@endsection
