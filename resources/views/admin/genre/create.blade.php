<!DOCTYPE html>
<html>
<head>
    <title>Create Genre</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/genre2.css') }}">
</head>
<body>
    <h1>Create Genre</h1>

    <form method="POST" action="{{ route('admin.genres.store') }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <!-- Add any additional fields for the genre creation form -->

        <button type="submit">Create</button>
    </form>
</body>
</html>
