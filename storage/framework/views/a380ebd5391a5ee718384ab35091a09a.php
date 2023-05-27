<!DOCTYPE html>
<html>
<head>
    <title>Venue List</title>
</head>
<body>
    <h1>Venue List</h1>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/venue1.css')); ?>">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $venues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($venue->name); ?></td>
                    <td><?php echo e($venue->address); ?></td>
                    <td><?php echo e($venue->contact_number); ?></td>
                    <td><a href="<?php echo e(route('admin.venues.edit', $venue->id)); ?>">Edit</a></td>
                    <td>
                        <form method="POST" action="<?php echo e(route('admin.venues.destroy', $venue->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('admin.venues.create')); ?>">Add New Venue</a>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\music3\resources\views/admin/venue/index.blade.php ENDPATH**/ ?>