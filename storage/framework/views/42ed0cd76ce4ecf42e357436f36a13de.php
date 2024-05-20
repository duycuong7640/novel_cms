<header id="header" class="bg-opacity">
    <div class="main-width">
        <div class="wh1">
            <div class="logo">
                <a href="<?php echo e(route("client.home")); ?>" title="Logo">
                    <img
                        src="<?php echo !empty($data['commonSetting']["logo"]->thumbnail) ? $data['commonSetting']["logo"]->thumbnail : ''; ?>"
                        title="Logo" alt="Logo"/>
                </a>
            </div>
        </div>
        <div class="wh2">
            <form method="get" action="">
                <input type="text" name="keyword" placeholder="Keyword..." />
                <button type="button"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="wh3">
            <?php echo $__env->make('pages::elements.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</header>
<?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Pages/Resources/views/elements/header.blade.php ENDPATH**/ ?>