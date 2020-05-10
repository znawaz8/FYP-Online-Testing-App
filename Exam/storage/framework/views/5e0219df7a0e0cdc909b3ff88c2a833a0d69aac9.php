<?php $__env->startSection('table_view'); ?>
<!-- Users Table-->
    <?php if(!$users->isEmpty()): ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>User Name</th>
                    <th>E-mail</th>
                </tr>
                </thead>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>