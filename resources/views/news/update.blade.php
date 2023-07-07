<!-- register.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>News</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap5.css') }}">
</head>

<body>
    <div class="row justify-content-center align-items-center">
        <div class="col-5">
            <h2>Update news</h2>
            <form method="POST" action="{{ route('news.update', $news->id) }}">
                @csrf
                @method('PUT')
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $news->title }}" required><br><br>

                <label for="content">Content:</label>
                <input type="text" id="content" name="content" value="{{ $news->content }}" required><br><br>

                <label for="category">Category:</label>
                <select id="category" name="category" class="form-select" required="required">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $news->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <br><br>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</body>

</html>
