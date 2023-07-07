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
    @extends('layout')
    @section('content')
        <h2>User List</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Is Enabled</th>
                <th>Role</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->isEnabled ? 'Yes' : 'No' }}</td>
                <td>{{ $user->role }}</td>
            </tr>
            @endforeach
        </table>
        <a href="{{ route('news.index') }}" class="btn btn-primary mt-3">View News</a>
    @endsection
</body>

</html>
