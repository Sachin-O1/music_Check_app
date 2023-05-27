<!DOCTYPE html>
<html>
<head>
    <title>Create Artist</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/artist2.css')); ?>">
</head>
<body>
    <h1>Create Artist</h1>

    <form method="POST" action="<?php echo e(route('admin.artists.store')); ?>">
        <?php echo csrf_field(); ?>

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <!-- Add any additional fields for the artist creation form -->

        <button type="submit">Create</button>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\music3\resources\views/admin/artist/create.blade.php ENDPATH**/ ?>