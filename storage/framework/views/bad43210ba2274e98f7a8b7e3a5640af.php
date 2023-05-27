<!DOCTYPE html>
<html>
<head>
    <title>Event List</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/artist2.css')); ?>">
</head>
<body>
    <h1>Event List</h1>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Date</th>
                <th>Artist</th>
                <th>Venue</th>
                <th>Amount</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($event->title); ?></td>
                    <td><?php echo e($event->genre->name); ?></td>
                    <td><?php echo e($event->date); ?></td>
                    <td><?php echo e($event->artist->name); ?></td>
                    <td><?php echo e($event->venue->name); ?></td>
                    <td><?php echo e($event->amount); ?></td>
                    <td><a href="<?php echo e(route('admin.events.edit', $event->id)); ?>">Edit</a></td>
                    <td>
                        <form method="POST" action="<?php echo e(route('admin.events.destroy', $event->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('admin.events.create')); ?>">Add New Event</a>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\music3\resources\views/admin/event/index.blade.php ENDPATH**/ ?>