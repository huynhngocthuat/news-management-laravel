<!-- login.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap5.css') }}">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-5">
                <h2>Login</h2>
                <form method="POST" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                @if ($errors->has('error'))
                <div class="alert alert-danger mt-3">
                    {{ $errors->first('error') }}
                </div>
                @endif
                <div class="mt-3">
                    <p>Don't have an account? <a href="{{ route('users.register') }}">Register</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap5.js') }}"></script>
</body>

</html>
