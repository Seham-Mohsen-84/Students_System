<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin Panel')</title>

    {{-- Bootstrap (من Vite/Build أو CDN كـ fallback) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    {{-- CSS الخاص بالـ admin (لو عندك Skydash أو أي custom style) --}}
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="d-flex">

{{-- Sidebar --}}
<div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">
    <h2 class="fs-4">Admin Panel</h2>
    <hr>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active fw-bold' : '' }}">
                <i class="fa fa-home me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.books.index') }}"
               class="nav-link text-white {{ request()->routeIs('admin.books.*') ? 'active fw-bold' : '' }}">
                <i class="fa fa-book me-2"></i> Books
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}"
               class="nav-link text-white {{ request()->routeIs('admin.users.*') ? 'active fw-bold' : '' }}">
                <i class="fa fa-users me-2"></i> Users
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.profile.edit') }}"
               class="nav-link text-white {{ request()->routeIs('admin.profile.edit') ? 'active fw-bold' : '' }}">
                <i class="fa fa-user me-2"></i> Profile
            </a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link text-white nav-link">
                    <i class="fa fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>

{{-- Main Content --}}
<div class="flex-fill">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">@yield('page-title','Dashboard')</span>
        </div>
    </nav>

    {{-- Content --}}
    <main class="p-4">
        @yield('content')
    </main>
</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stack('scripts')
</body>
</html>
