<?php $__env->startSection('content'); ?>
    <div class="section-list bg-opacity radius">
        <h1 class="title">New</h1>
        <div class="wrap-list-category">
            <?php for($i=0; $i<=30; $i ++): ?>
                <div class="item-category">
                    <button type="button" class="radius-tiny">
                        <a href="" title="">
                            Romantic
                        </a>
                    </button>
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Pages/Resources/views/products/categories.blade.php ENDPATH**/ ?>