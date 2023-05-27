<!DOCTYPE html>
<html>
<head>
    <title>Create Venue</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/venue2.css') }}">
</head>
<body>
    <h1>Create Venue</h1>

    <form method="POST" action="{{ route('admin.venues.store') }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" required>

        <!-- Add any additional fields for the venue creation form -->

        <button type="submit">Create</button>
    </form>
</body>
</html>
