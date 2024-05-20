<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#" class="no-js" lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link type="image/x-icon" href="<?php echo e(asset('/static/admin/images/favicon.jpeg')); ?>" rel="icon">
    <link type="image/x-icon" href="<?php echo e(asset('/static/admin/images/favicon.jpeg')); ?>" rel="shortcut icon">
    <title><?php echo e(!empty($data['common']['title']) ? $data['common']['title'] : ''); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('/static/admin/assets/plugins/%40mdi/font/css/materialdesignicons.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('/static/admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('/static/admin/css/app.css')); ?>"/>
</head>
<body>
<?php echo $__env->yieldContent('content'); ?>
<script type="text/javascript" src="<?php echo e(asset('/static/admin/js/app.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>
<?php echo $__env->yieldContent('validate'); ?>
</body>
</html><?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Admins/Resources/views/layouts/login.blade.php ENDPATH**/ ?>