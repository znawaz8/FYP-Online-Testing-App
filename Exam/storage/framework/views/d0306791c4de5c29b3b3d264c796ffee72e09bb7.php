<?php $__env->startSection('table_view'); ?>
    <?php echo $__env->make('errors.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Form::open(['action' => ['CategoryController@postNew'], 'method'=>'post', 'class'=>'form-horizontal']); ?>



    <div class="form-group">
        <?php echo Form::label('name', 'Name of category', ['class'=>'col-md-2 control-label']); ?>

        <div class="col-md-10">
            <?php echo Form::text('name', null, ['class'=>'form-control']); ?>

        </div>
    </div>
    <div class="form-group">
        <?php echo Form::label('status', 'Active', ['class'=>'col-md-2 control-label']); ?>

        <div class="col-md-10">
            <?php echo Form::checkbox('status'); ?>

        </div>
    </div>
    <?php echo Form::token(); ?>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo Form::submit('Create category', ['class'=>'btn btn-primary']); ?>

        </div>
    </div>
    <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>