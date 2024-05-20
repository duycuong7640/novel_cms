<script type="text/javascript" src="<?php echo e(asset('/static/web/js/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/static/web/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/static/web/js/menu/ddsmoothmenu.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/static/web/js/main.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
<?php echo $__env->yieldContent('validate'); ?>
<script type="text/javascript">
    ddsmoothmenu.init({
        mainmenuid: "smoothmenu1",
        orientation: 'h',
        classname: 'ddsmoothmenu',
        contentsource: "markup"
    });
</script>
<?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Pages/Resources/views/elements/extend/script.blade.php ENDPATH**/ ?>