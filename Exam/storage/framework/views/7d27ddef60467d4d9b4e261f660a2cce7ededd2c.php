<?php $__env->startSection('table_view'); ?>
    <?php if($answers): ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>User Name</th>
                    <th>E-mail</th>
                    <th>Test name</th>
                    <th>Total Marks(%)</th>
                    <th>Time taken</th>
                    <th>Exam Date</th>
                </tr>
                </thead>
                <?php foreach($answers as $ans): ?>
                    <tr>
                        <td><?php echo e($ans->username); ?></td>
                        <td><?php echo e($ans->useremail); ?></td>
                        <td><?php echo e($ans->subjectname); ?></td>
                        <td><?php echo e(ceil($ans->porcent)); ?>%</td>
                        <td><?php echo e($ans->time); ?></td>
                        <td><?php echo e($ans->created_at); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('pagination'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>