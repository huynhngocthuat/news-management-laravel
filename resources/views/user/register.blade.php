<!-- register.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap5.css') }}">
</head>

<body>
    <div class="row justify-content-center align-items-center">
        <div class="col-5">
            <h2>Registration</h2>
            <form method="POST" action="{{ route('users.register') }}">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>

                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required><br><br>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

</body>

</html>