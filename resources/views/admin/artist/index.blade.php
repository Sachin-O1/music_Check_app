<!DOCTYPE html>
<html>
<head>
    <title>Artist List</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/artist1.css') }}">

</head>
<body>
    <h1>Artist List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artists as $artist)
                <tr>
                    <td>{{ $artist->name }}</td>
                    <td><a href="{{ route('admin.artists.edit', $artist->id) }}">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('admin.artists.destroy', $artist->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.artists.create') }}">Add New Artist</a>
</body>
</html>
