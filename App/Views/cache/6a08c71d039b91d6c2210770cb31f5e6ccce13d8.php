<?php $__env->startSection('content'); ?>
    <p>This is Laravel content.</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Test.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>