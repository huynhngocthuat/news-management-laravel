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
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
        </tr>
        @foreach ($newses as $news)
        <tr>
            <td>{{ $news->title }}</td>
            <td>{{ $news->content }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>