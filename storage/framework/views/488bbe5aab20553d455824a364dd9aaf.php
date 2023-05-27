<!DOCTYPE html>
<html>
<head>
    <title>Artist List</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/artist1.css')); ?>">

</head>
<body>
    <h1>Artist List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($artist->name); ?></td>
                    <td><a href="<?php echo e(route('admin.artists.edit', $artist->id)); ?>">Edit</a></td>
                    <td>
                        <form method="POST" action="<?php echo e(route('admin.artists.destroy', $artist->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('admin.artists.create')); ?>">Add New Artist</a>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\music3\resources\views/admin/artist/index.blade.php ENDPATH**/ ?>