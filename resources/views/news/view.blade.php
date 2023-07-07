<!-- users.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap5.css') }}">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <a href="{{ route('news.create') }}" class="btn btn-primary">Create News</a>
    <h2>News List</h2>
    <div>
        <label for="category-filter">Filter by Category:</label>
        <select id="category-filter" onchange="applyCategoryFilter(this.value)">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="title-search">Search by Title:</label>
        <input type="text" id="title-search" placeholder="Enter title">
        <button onclick="searchByTitle()">Search</button>
    </div>
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Category</th>
            <th>Name User</th>
            <th>Action</th>
        </tr>
        @foreach ($newses as $news)
        <tr>
            <td>{{ $news->title }}</td>
            <td>{{ $news->content }}</td>
            <td>{{ $news->category ? $news->category->name : 'N/A' }}</td>
            <td>{{ $news->user->name }}</td>
            <td>
                <a href="{{ route('news.edit', $news->id) }}" class="btn btn-outline-warning">Edit</a>
                <a class="btn btn-outline-danger" onclick="deleteNews('{{ $news->id }}')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function applyCategoryFilter(categoryId) {
        // Redirect to the same page with the selected category filter
        if (categoryId) {
            window.location.href = '{{ route('news.index') }}?category=' + categoryId;
        } else {
            window.location.href = '{{ route('news.index') }}';
        }
    }
    function searchByTitle() {
        var title = document.getElementById('title-search').value;
        // Redirect to the same page with the search query parameter
        window.location.href = '{{ route('news.index') }}?search=' + encodeURIComponent(title);
    }
    function deleteNews(newsId) {
        console.log(newsId);
        // Confirm deletion
        if (!confirm("Are you sure you want to delete this news item?")) {
            return false;
        }

        // Send the delete request
        axios.delete('/news/' + newsId)
            .then(response => {
                // Handle the response (e.g., show success message, update the UI)
                location.reload();
            })
            .catch(error => {
                // Handle the error (e.g., show error message, handle specific errors)
                console.error(error);
            });
    }
</script>

</html>
