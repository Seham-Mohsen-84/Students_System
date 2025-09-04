@extends('layouts.student')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="text-primary">All Currently Borrowed Books</h3>

        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Borrowed By</th>
                    <th>Borrowed At</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->book->title }}</td>
                        <td>{{ $borrow->user->name }}</td>
                        <td>{{ $borrow->borrowed_at }}</td>
                        <td>{{ $borrow->due_date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted text-center">
                            No borrowed books right now
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
