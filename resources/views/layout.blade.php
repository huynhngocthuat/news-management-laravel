<!DOCTYPE html>
<html>
<head>
    <title>News Management System</title>
    <!-- Include your CSS and other head elements -->
</head>
<body>
    <nav>
        @auth
            <form method="POST" action="{{ route('auth.logout') }}" class="d-flex justify-content-end">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        @endauth
    </nav>

    <div class="container mt-3">
        @yield('content')
    </div>

    <!-- Include your JavaScript files -->
</body>
</html>
