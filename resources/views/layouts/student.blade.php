<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background: linear-gradient(to right, #e6f2ff, #cce6ff);
        }
        .navbar-brand {
            font-weight: bold;
            color: #0056b3 !important;
        }
        .nav-link {
            color: #004080 !important;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #00264d !important;
        }
        .username {
            font-weight: bold;
            color: #003366;
            margin-right: 15px;
            text-decoration: none;
        }
        .username:hover {
            color: #001a33;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom p-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('books.index') }}">📘 Library</a>

            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('borrows.index') }}">My Borrows</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Books</a></li>
                        <li class="nav-item">
                         <a class="nav-link" href="{{ route('borrows.all') }}">Borrowed Books</a>
                        </li>

                    @endauth
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endguest
                </ul>
            </div>

            <div class="d-flex align-items-center">
                @auth
                    <a href="{{ route('profile.edit') }}" class="username">👤 {{ Auth::user()->name }}</a>
                    <form action="{{ route('logout') }}" method="POST" class="ms-2">
                        @csrf
                        <button class="btn btn-sm btn-danger" type="submit">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
