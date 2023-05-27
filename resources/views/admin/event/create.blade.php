<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/artist2.css') }}">
</head>
<body>
    <h1>Create Event</h1>

    <form method="POST" action="{{ route('admin.events.store') }}">
        @csrf

        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="genre_id">Genre:</label>
        <select name="genre_id" required>
            <!-- Iterate through genres -->
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>

        <label for="date">Date:</label>
        <input type="date" name="date" required>

        <label for="artist_id">Artist:</label>
        <select name="artist_id" required>
            <!-- Iterate through artists -->
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
            @endforeach
        </select>

        <label for="venue_id">Venue:</label>
        <select name="venue_id" required>
            <!-- Iterate through venues -->
            @foreach($venues as $venue)
                <option value="{{ $venue->id }}">{{ $venue->name }}</option>
            @endforeach
        </select>

        <label for="amount">Amount:</label>
        <input type="text" name="amount" required>

        <!-- Add any additional fields for the event creation form -->

        <button type="submit">Create</button>
    </form>
</body>
</html>
