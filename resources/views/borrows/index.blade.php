@extends('layouts.student')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h1 class="h4 text-primary">My Borrowed Books</h1>

        <ul class="list-group mt-3">
            @foreach($borrows as $borrow)
                <li class="list-group-item">
                    <strong>{{ $borrow->book->title }}</strong><br>
                    <small>
                        Borrowed: {{ $borrow->borrowed_at }} <br>
                        Due: {{ $borrow->due_date }} <br>
                        Status: <span class="badge bg-info text-dark">{{ ucfirst($borrow->status) }}</span>
                    </small>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
