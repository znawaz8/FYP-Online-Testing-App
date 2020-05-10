<?php $__env->startSection('content'); ?>


    <?php if(Session::has('flash_mess')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('flash_mess')); ?></div>
    <?php endif; ?>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> <?php echo e($title); ?></div>

        <?php echo $__env->yieldContent('table_view'); ?>



        <!--Pagination of results-->
    <?php echo $__env->yieldContent('pagination'); ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>