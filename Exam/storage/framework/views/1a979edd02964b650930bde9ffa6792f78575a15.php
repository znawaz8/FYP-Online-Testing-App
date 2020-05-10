<?php $__env->startSection('table_view'); ?>
    <?php if(!$subjects->isEmpty()): ?>
        <div class="table-responsive">
            <!-- Subject Listing -->
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Category</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach($subjects as $subject): ?>
                    <tr>
                        <td><?php echo e($subject->name); ?></td>
                        <td><?php echo e($subject->category->name); ?></td>
                        <td><?php echo e($subject->duration); ?> mins</td>
                        <td>
                            <h4>
                            <?php if($subject->status == 1): ?>
                                <span class="label label-success">Active
                             <?php else: ?>
                                        <span class="label label-warning">Inactivate
                                            <?php endif; ?>

                                </span>
                            </h4>
                        </td>
                        <td>
                            <a class="btn btn-info" href="<?php echo e(action('SubjectController@getQuestions', [$subject->id])); ?>">Manage Questions</a>
                            <a class="btn btn-warning" href="<?php echo e(action('SubjectController@getEdit', [$subject->id])); ?>">Edit</a>
                            <a class="btn btn-danger" id="btn-delete" href="<?php echo e(action('SubjectController@getDelete', [$subject->id])); ?>">Delete</a>
                        </td>

                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagination'); ?>
    <?php echo e($subjects->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>