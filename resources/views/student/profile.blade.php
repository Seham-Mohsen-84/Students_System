@extends('layouts.student')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="text-primary">👤 My Profile</h3>



        {{--  Update Profile --}}
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter new password">
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter new password">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success w-50 me-2">Update Profile</button>
        </form>

        {{--  Delete Account  --}}
                <form action="{{ route('profile.destroy') }}" method="POST" class="w-50"
                      onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">Delete Account</button>
                </form>
            </div>
    </div>
</div>
@endsection
