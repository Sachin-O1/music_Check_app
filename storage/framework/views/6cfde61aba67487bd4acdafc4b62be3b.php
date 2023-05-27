<!DOCTYPE html>
<html>
<head>
    <title>Genre List</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/genre1.css')); ?>">
</head>
<body>
    <h1>Genre List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($genre->name); ?></td>
                    <td><a href="<?php echo e(route('admin.genres.edit', $genre->id)); ?>">Edit</a></td>
                    <td>
                        <form method="POST" action="<?php echo e(route('admin.genres.destroy', $genre->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('admin.genres.create')); ?>">Add New Genre</a>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\music3\resources\views/admin/genre/index.blade.php ENDPATH**/ ?>