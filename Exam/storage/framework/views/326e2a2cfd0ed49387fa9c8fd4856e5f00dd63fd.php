<?php if($errors->any()): ?>
    <?php foreach($errors->all() as $error): ?>
        <div class="alert alert-danger" role="alert"><?php echo e($error); ?></div>
    <?php endforeach; ?>
<?php endif; ?>