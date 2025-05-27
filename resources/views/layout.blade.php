<!DOCTYPE html>
<html>
<head>
    <title>Leave Requests Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="{{ route('home') }}">LeaveApp</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <span class="nav-link">Welcome, {{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="/logout" class="d-inline">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container py-4">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
