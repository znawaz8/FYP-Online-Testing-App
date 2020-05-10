<?php $__env->startSection('table_view'); ?>
    <div class="row">
        <div class="col-md-offset-1 col-md-7">
            <h3>Subject name: <?php echo e($subject->name); ?></h3>
            <h3>Category: <?php echo e($subject->category->name); ?></h3>
            <h3>Duration: <?php echo e($subject->duration); ?> minutes</h3>

        </div>

    </div>
    <br>
    <a class="btn btn-warning" href="<?php echo e(action('SubjectController@getIndex')); ?>"><span class="glyphicon glyphicon-arrow-left"></span> Back to subjects</a>

    <button type="button" class="btn btn-primary" id="btn-add-new-question"><span class="glyphicon glyphicon-plus"></span> Add new question</button>
<br><br><br>

    <?php echo $__env->make('errors.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::open(['action'=>['SubjectController@postNewQuestion', $subject->id], 'method'=>'POST', 'class'=>'form-horizontal', 'id'=>'add-new-question']); ?>

    <?php echo $__env->make('subject.formquestion', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if(!$questions->isEmpty()): ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> Questions added</div>

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php $i=0;?>
        <?php foreach($questions as $question): ?>

            <?php $i++;?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading<?php echo e($question->id); ?>">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($question->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($question->id); ?>">
                                Question #<?php echo e($i); ?>

                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo e($question->id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo e($question->id); ?>">
                        <div class="panel-body">
                            <?php echo Form::model($question, ['action'=>['SubjectController@postEditQuestion', $question->id], 'method'=>'POST', 'class'=>'form-horizontal', 'id'=>'add-new-question']); ?>

                            <?php echo $__env->make('subject.formquestion', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        </div>
                    </div>
                </div>

        <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>