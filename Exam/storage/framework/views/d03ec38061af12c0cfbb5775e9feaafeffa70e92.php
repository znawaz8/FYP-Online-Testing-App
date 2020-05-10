<?php $__env->startSection('content'); ?>
    <div id="counter1"></div>

<?php $__env->startSection('script_clock'); ?>
        $(function() {
            var clock = $('#counter1').FlipClock(<?php echo e($duration*60); ?>, {
                autoStart: false,
                countdown: true,
                clockFace: 'MinuteCounter',
                callbacks: {
                     interval: function () {
                         var time = clock.getTime().time;
                         //alert(time);
                        <?php foreach($questions as $q): ?>
                            $('#time_taken<?php echo e($q->id); ?>').val(time);
                        <?php endforeach; ?>
                    },
                stop: function(){
                alert("The time has run out!");
                window.location.replace("<?php echo e(route('result', [$subject->id])); ?>");
                }

        }
        });
        clock.start();



 <?php $__env->stopSection(); ?>

<?php foreach($questions as $question): ?>
    <div class="jumbotron" id="jumbotron<?php echo e($question->id); ?>"
            <?php if($question->id != $current_question_id): ?>
                style="display: none;"
            <?php endif; ?>
            >
        <p>Question #<?php echo e($question->id); ?></p>
        <p><?php echo e($question->question); ?></p>

        <?php echo Form::open(['action'=>['SubjectController@postSaveQuestionResult', $subject->id], 'method'=>'post', 'id'=>'frm'.$question->id]); ?>


        <ul id="answer-radio<?php echo e($question->id); ?>">
            <div class="btn-group" data-toggle="buttons">

                <li>
                    <label>
                        <input type="radio" name="option" value="1" /> <?php echo e($question->option1); ?>

                    </label>
                </li>
                    <li>
                        <label>
                            <input type="radio" name="option" value="2" /> <?php echo e($question->option2); ?>

                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="option" value="3" /> <?php echo e($question->option3); ?>

                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="option" value="4" /> <?php echo e($question->option4); ?>

                        </label>
                    </li>

            </div>
        </ul>

        <?php echo Form::input('hidden','question_id', $question->id); ?>

        <?php echo Form::input('hidden','time_taken'.$question->id,null,['id'=>'time_taken'.$question->id]); ?>


        <?php echo Form::token(); ?>



    <?php if($question->id != $first_question_id): ?>
            <!--a class="btn btn-info" href="#" id="previous-btn" role="button"><span class="glyphicon glyphicon-chevron-left"></span> Previous</a-->
        <?php endif; ?>
        <!--a class="btn btn-info" href="<?php echo e(action('SubjectController@postSaveQuestionResult',[$subject->id])); ?>" role="button">Next <span class="glyphicon glyphicon-chevron-right"></span></a-->

        <?php if($question->id == $last_question_id): ?>
        <?php echo Form::submit('Last', ['class'=>'btn btn-info']); ?>

        <?php else: ?>
            <?php echo Form::submit('Next', ['class'=>'btn btn-info']); ?>

            <?php endif; ?>
        <?php echo Form::close(); ?>

    </div>

    <?php if($questions->count()>1): ?>
<?php $__env->startSection('script_form'); ?>
    $(function() {

    //console.log(<?php echo e($question->id); ?>);
    //console.log(<?php echo e($last_question_id); ?>);

    $('#frm<?php echo $question->id; ?>').on('submit', function(e){
    e.preventDefault();
            var form = $(this);
            var $formAction = form.attr('action');

            var $userAnswer = $('input[name=option]:checked', $('#frm<?php echo e($question->id); ?>')).val();


            $.post($formAction, $(this).serialize(), function(data){

                    //if(data.next_question_id != null)
                        $('#jumbotron<?php echo e($question->id); ?>').hide();
                        //console.log(data.next_question_id);
                        $('#jumbotron' + data.next_question_id+'').show();
           });



        });
    });

    });
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php endforeach; ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>