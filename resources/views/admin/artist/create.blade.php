<!DOCTYPE html>
<html>
<head>
    <title>Create Artist</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/artist2.css') }}">
</head>
<body>
    <h1>Create Artist</h1>

    <form method="POST" action="{{ route('admin.artists.store') }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <!-- Add any additional fields for the artist creation form -->

        <button type="submit">Create</button>
    </form>
</body>
</html>
