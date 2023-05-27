<!DOCTYPE html>
<html>
<head>
    <title>Genre List</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/genre1.css') }}">
</head>
<body>
    <h1>Genre List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
                <tr>
                    <td>{{ $genre->name }}</td>
                    <td><a href="{{ route('admin.genres.edit', $genre->id) }}">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('admin.genres.destroy', $genre->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.genres.create') }}">Add New Genre</a>
</body>
</html>
