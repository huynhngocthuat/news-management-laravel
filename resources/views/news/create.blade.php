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
            <h2>Create news</h2>
            <form method="POST" action="{{ route('news.create') }}">
                @csrf
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required><br><br>

                <label for="content">Content:</label>
                <input type="text" id="content" name="content" required><br><br>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

</body>

</html>