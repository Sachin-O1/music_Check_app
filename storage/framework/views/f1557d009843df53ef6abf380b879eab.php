<!DOCTYPE html>
<html>
<head>
    <title>Upcoming Music Events</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/home.css')); ?>">
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <style>
        /* Add your custom CSS styles here */
    </style>
</head>
<body>
    <h1>Upcoming Music Events</h1>

    <!-- Search Form -->
    <form method="GET" action="<?php echo e(route('events.search')); ?>">
        <input type="text" name="search" placeholder="Search by event name">
        <button type="submit">Search</button>
    </form>

    <!-- Filter Form -->
    <form method="GET" action="<?php echo e(route('events.filter')); ?>">
        <select name="artist_id">
            <option value="">All Artists</option>
            <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($artist->id); ?>"><?php echo e($artist->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <select name="genre_id">
            <option value="">All Genres</option>
            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($genre->id); ?>"><?php echo e($genre->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <input type="date" name="date" placeholder="Select date">

        <button type="submit">Filter</button>
    </form>

    <!-- List of Events -->
    <ul>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <h2><?php echo e($event->title); ?></h2>
                <p>Genre: <?php echo e($event->genre->name); ?></p>
                <p>Date: <?php echo e($event->date); ?></p>
                <p>Artist: <?php echo e($event->artist->name); ?></p>
                <p>Venue: <?php echo e($event->venue->name); ?></p>
                <p>Amount: <?php echo e($event->amount); ?></p>
                <img src="<?php echo e($event->image); ?>" alt="Event Image">
                <p><?php echo e($event->short_description); ?></p>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <!-- Pagination Links -->
    <?php echo e($events->links()); ?>


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
<?php /**PATH C:\xampp\htdocs\music3\resources\views/home.blade.php ENDPATH**/ ?>