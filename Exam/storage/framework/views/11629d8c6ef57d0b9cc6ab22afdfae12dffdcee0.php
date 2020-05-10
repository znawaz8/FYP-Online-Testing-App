<?php $__env->startSection('content'); ?>
<!-- User Page to Start Test -->
    <div class="jumbotron">
        <h3>Subject Name: <b><?php echo e($subject->name); ?></b></h3>
        <h3>Duration: <b><?php echo e($subject->duration); ?></b></h3>

        <a class="btn btn-success btn-lg" href="<?php echo e(action('SubjectController@getStartTest',$subject->id)); ?>" role="button">START EXAM</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>