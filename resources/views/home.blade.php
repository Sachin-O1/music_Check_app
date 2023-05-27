<!DOCTYPE html>
<html>
<head>
    <title>Upcoming Music Events</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        /* Add your custom CSS styles here */
    </style>
</head>
<body>
    <h1>Upcoming Music Events</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('events.search') }}">
        <input type="text" name="search" placeholder="Search by event name">
        <button type="submit">Search</button>
    </form>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('events.filter') }}">
        <select name="artist_id">
            <option value="">All Artists</option>
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
            @endforeach
        </select>

        <select name="genre_id">
            <option value="">All Genres</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>

        <input type="date" name="date" placeholder="Select date">

        <button type="submit">Filter</button>
    </form>

    <!-- List of Events -->
    <ul>
        @foreach($events as $event)
            <li>
                <h2>{{ $event->title }}</h2>
                <p>Genre: {{ $event->genre->name }}</p>
                <p>Date: {{ $event->date }}</p>
                <p>Artist: {{ $event->artist->name }}</p>
                <p>Venue: {{ $event->venue->name }}</p>
                <p>Amount: {{ $event->amount }}</p>
                <img src="{{ $event->image }}" alt="Event Image">
                <p>{{ $event->short_description }}</p>
            </li>
        @endforeach
    </ul>

    <!-- Pagination Links -->
    {{ $events->links() }}

    <script>
        // Load more events on scroll
        window.addEventListener('scroll', function() {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
                loadMoreEvents();
            }
        });

        // AJAX request to load more events
        function loadMoreEvents() {
            var nextPage = document.querySelector('ul.pagination li.active + li a');
            if (nextPage !== null) {
                var url = nextPage.href;
                var xhr = new XMLHttpRequest();
                xhr.open('GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        var eventList = document.querySelector('ul');
                        eventList.insertAdjacentHTML('beforeend', response.html);
                    }
                };
                xhr.send();
            }
        }
    </script>
</body>
</html>
