<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/artist2.css')); ?>">
</head>
<body>
    <h1>Create Event</h1>

    <form method="POST" action="<?php echo e(route('admin.events.store')); ?>">
        <?php echo csrf_field(); ?>

        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="genre_id">Genre:</label>
        <select name="genre_id" required>
            <!-- Iterate through genres -->
            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($genre->id); ?>"><?php echo e($genre->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="date">Date:</label>
        <input type="date" name="date" required>

        <label for="artist_id">Artist:</label>
        <select name="artist_id" required>
            <!-- Iterate through artists -->
            <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($artist->id); ?>"><?php echo e($artist->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="venue_id">Venue:</label>
        <select name="venue_id" required>
            <!-- Iterate through venues -->
            <?php $__currentLoopData = $venues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($venue->id); ?>"><?php echo e($venue->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="amount">Amount:</label>
        <input type="text" name="amount" required>

        <!-- Add any additional fields for the event creation form -->

        <button type="submit">Create</button>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\music3\resources\views/admin/event/create.blade.php ENDPATH**/ ?>