<?php $__env->startSection('table_view'); ?>
    <?php if(!$categories->isEmpty()): ?>
        <!-- Categories listing-->
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Category name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo e($category->name); ?></td>
                        <td>
                            <h4>
                            <?php if($category->status == 1): ?>
                                <span class="label label-success">Active
                             <?php else: ?>
                                        <span class="label label-warning">Inactivate
                                            <?php endif; ?>

                                </span>
                            </h4>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="<?php echo e(action('CategoryController@getEdit', [$category->id])); ?>">Edit</a>
                            <a class="btn btn-danger" id="btn-delete-category" href="<?php echo e(action('CategoryController@getDelete', [$category->id])); ?>">Delete</a>
                        </td>

                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagination'); ?>
    <?php echo e($categories->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>