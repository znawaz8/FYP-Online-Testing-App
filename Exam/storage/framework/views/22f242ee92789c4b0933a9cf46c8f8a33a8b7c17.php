<?php $__env->startSection('content'); ?>
    <?php if(Session::has('flash_mess')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('flash_mess')); ?></div>
    <?php endif; ?>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> <?php echo e($title); ?></div>
        <p>Subject: <?php echo e($subject->name); ?></p>
        <p>Total questions: <?php echo e($cnt); ?></p>
        <p>Time taken: <?php echo e($time_taken); ?></p>
        

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>