@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Details</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>ID:</strong> {{ $user->id }}</p>
                                <p><strong>Name:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <strong>Role:</strong>
                                    <span class="badge bg-{{ $user->role === 'admin' ? 'primary' : 'success' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </p>
                                <p><strong>Joined At:</strong> {{ $user->created_at->format('Y-m-d H:i') }}</p>
                                <p><strong>Last Update:</strong> {{ $user->updated_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
