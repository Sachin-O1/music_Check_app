<!DOCTYPE html>
<html>
<head>
    <title>Event List</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/artist2.css') }}">
</head>
<body>
    <h1>Event List</h1>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Date</th>
                <th>Artist</th>
                <th>Venue</th>
                <th>Amount</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->genre->name }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->artist->name }}</td>
                    <td>{{ $event->venue->name }}</td>
                    <td>{{ $event->amount }}</td>
                    <td><a href="{{ route('admin.events.edit', $event->id) }}">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.events.create') }}">Add New Event</a>
</body>
</html>
