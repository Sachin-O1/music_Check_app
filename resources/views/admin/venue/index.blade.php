<!DOCTYPE html>
<html>
<head>
    <title>Venue List</title>
</head>
<body>
    <h1>Venue List</h1>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/venue1.css') }}">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venues as $venue)
                <tr>
                    <td>{{ $venue->name }}</td>
                    <td>{{ $venue->address }}</td>
                    <td>{{ $venue->contact_number }}</td>
                    <td><a href="{{ route('admin.venues.edit', $venue->id) }}">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('admin.venues.destroy', $venue->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.venues.create') }}">Add New Venue</a>
</body>
</html>
