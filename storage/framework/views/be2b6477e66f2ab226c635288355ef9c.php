<!DOCTYPE html>
<html>
<head>
    <title>Create Genre</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/genre2.css')); ?>">
</head>
<body>
    <h1>Create Genre</h1>

    <form method="POST" action="<?php echo e(route('admin.genres.store')); ?>">
        <?php echo csrf_field(); ?>

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <!-- Add any additional fields for the genre creation form -->

        <button type="submit">Create</button>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\music3\resources\views/admin/genre/create.blade.php ENDPATH**/ ?>