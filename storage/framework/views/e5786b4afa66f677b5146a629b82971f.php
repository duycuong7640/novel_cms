<!DOCTYPE html>
<head>
    <?php echo $__env->make('pages::elements.extend.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages::elements.extend.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('pages::elements.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('pages::elements.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section id="main-content" class="main-width2">
    <div class="wrap-content-extend">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</section>
<?php echo $__env->make('pages::elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('pages::elements.extend.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Pages/Resources/views/layouts/extend.blade.php ENDPATH**/ ?>