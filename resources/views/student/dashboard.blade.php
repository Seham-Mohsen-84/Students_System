@extends('layouts.student')

@section('content')
<div class="container d-flex justify-content-center flex-column align-items-center">

    {{--home cards --}}
    <div class="row mb-4 w-100 justify-content-center">
        <div class="col-md-3">
            <div class="card text-center shadow-lg p-4 bg-light">
                <div class="card-body">
                    <h6 class="text-secondary">Borrowed Now</h6>
                    <h2 class="text-info fw-bold">{{ $borrows->where('status', 'borrowed')->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-lg p-4 bg-light">
                <div class="card-body">
                    <h6 class="text-secondary">Returned</h6>
                    <h2 class="text-success fw-bold">{{ $borrows->where('status', 'returned')->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-lg p-4 bg-light">
                <div class="card-body">
                    <h6 class="text-secondary">Total Borrows</h6>
                    <h2 class="text-dark fw-bold">{{ $borrows->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow-lg p-4 bg-light">
                <div class="card-body">
                    <h6 class="text-secondary">Next Due</h6>
                    @php
                        $nextDue = $borrows->where('status', 'borrowed')->sortBy('due_date')->first();
                    @endphp
                    <h5 class="text-danger fw-bold">
                        {{ $nextDue ? $nextDue->due_date : 'None' }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Borrows --}}
    <div class="card shadow-lg w-75">
        <div class="card-body">
            <h5 class="mb-3 text-center text-primary"> Recent Borrows</h5>
            <table class="table table-hover text-center">
                <thead class="table-light">
                    <tr>
                        <th>Book Title</th>
                        <th>Borrowed At</th>
                        <th>Due Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrows->sortByDesc('borrowed_at')->take(5) as $borrow)
                        <tr>
                            <td>{{ $borrow->book->title }}</td>
                            <td>{{ $borrow->borrowed_at }}</td>
                            <td>{{ $borrow->due_date }}</td>
                            <td>
                                <span class="badge
                                    {{ $borrow->status == 'borrowed' ? 'bg-info text-dark' : 'bg-success' }}">
                                    {{ ucfirst($borrow->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted text-center">No borrowed books yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- bottun to page.... --}}
                <div class="text-center mt-3">
                    <a href="{{ route('borrows.index') }}" class="btn btn-outline-primary me-2">
                         View my books
                    </a>
                    <a href="{{ route('books.index') }}" class="btn btn-outline-success">
                        View All Books
                    </a>
                     <a href="{{ route('borrows.all') }}" class="btn btn-outline-warning">
                         View  Borrowed Books
                     </a>
                </div>

        </div>
    </div>
</div>
@endsection
