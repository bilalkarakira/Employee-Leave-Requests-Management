<!DOCTYPE html>
<html>
<head>
    <title>Leave Requests Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>

</head>
<body>
@unless(request()->routeIs('login', 'register'))

    <nav class="bg-gray-200 shadow-md">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="{{asset('images/logo.png')}}" alt="logo" class="w-10 h-10">
                <a href="/" class="text-xl font-bold text-gray-800">Leave Requests Platform</a>
            </div>
            <div class="flex items-center">
                <ul class="flex space-x-4">
                    @auth
                        <li class="flex items-center">
                            <span class="text-gray-700">Welcome, {{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                        </li>
                        <li>
                            <form method="POST" action="/logout" class="inline-block">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-gray-900">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a class="text-gray-700 hover:text-gray-900" href="/login">Login</a></li>
                        <li><a class="text-gray-700 hover:text-gray-900" href="/register">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @endunless


    <div class="container py-4">

        @yield('content')
    </div>
</body>
</html>
