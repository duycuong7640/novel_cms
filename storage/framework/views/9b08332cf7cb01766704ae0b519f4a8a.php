<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php
    // $favico_web = DB::table('advertisements')->select('id', 'title', 'thumbnail', 'url', 'type')->where('type', 'favico_admin')->where('status', 1)->limit(1)->first();
?>
<link type="image/x-icon" href="<?php echo e(!empty($favico_web->thumbnail) ? asset($favico_web->thumbnail) : ''); ?>" rel="icon">
<link type="image/x-icon" href="<?php echo e(!empty($favico_web->thumbnail) ? asset($favico_web->thumbnail) : ''); ?>" rel="shortcut icon">
<title><?php echo e(!empty($data['common']['title']) ? $data['common']['title'] : ''); ?></title>
<?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Admins/Resources/views/elements/extend/meta.blade.php ENDPATH**/ ?>