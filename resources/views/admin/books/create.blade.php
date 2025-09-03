@extends('layouts.admin')

@section('title','Add Book')
@section('page-title','Add Book')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.books.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
