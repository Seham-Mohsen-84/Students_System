@extends('layouts.admin')

@section('title','Dashboard')
@section('page-title','Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Total Books --}}
            <div class="col-md-4">
                <div class="card text-bg-primary mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Books</h5>
                        <p class="card-text fs-3">{{ $totalBooks ?? 0 }}</p>
                    </div>
                </div>
            </div>

            {{-- Total Students --}}
            <div class="col-md-4">
                <div class="card text-bg-success mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Students</h5>
                        <p class="card-text fs-3">{{ $totalStudents ?? 0 }}</p>
                    </div>
                </div>
            </div>

            {{-- Borrowed Books --}}
            <div class="col-md-4">
                <div class="card text-bg-warning mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Borrowed Books</h5>
                        <p class="card-text fs-3">{{ $borrowedBooks ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Example Chart --}}
        <div class="card mt-4 shadow-sm">
            <div class="card-header">Borrow Status Overview</div>
            <div class="card-body">
                <canvas id="borrowChart" height="100"></canvas>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const ctx = document.getElementById('borrowChart');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Borrowed', 'Returned', 'Overdue'],
                datasets: [{
                    data: [{{ $borrowedBooks ?? 0 }}, {{ $returnedBooks ?? 0 }}, {{ $overdueBooks ?? 0 }}],
                    backgroundColor: ['#ffc107','#28a745','#dc3545']
                }]
            }
        });
    </script>
@endpush
