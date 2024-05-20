<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: <?php echo config('admins.name'); ?>

    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Admins/Resources/views/index.blade.php ENDPATH**/ ?>