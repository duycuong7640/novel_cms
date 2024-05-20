<?php $__env->startSection('content'); ?>
    <div class="section-list bg-opacity radius">
        <h1 class="title">Recent Updates</h1>
        <div class="wrap-list-content">
            <?php for($i=0; $i<=10; $i ++): ?>
                <div class="item">
                    <div class="img">
                        <a href="" title="">
                            <i class="cover"
                               style="background-image: url('http://novelcms:8888/storage/photos/images/s1.png')"></i>
                        </a>
                    </div>
                    <div class="info-novel">
                        <h3>
                            <a href="" title="">Black Knight From Blue Star Black Knight From Blue Star Black
                                Knight From Blue Star</a>
                        </h3>
                        <div class="chapter-lists">
                            <ul class="chapter">
                                <li>
                                    <span>#401</span>
                                    <a href="" title="">My master can beat you to death, and so can I, Xu Yan.</a>
                                </li>
                                <li>13 phút trước</li>
                            </ul>
                            <ul class="chapter">
                                <li>
                                    <span>#401</span>
                                    <a href="" title="">My master can beat you to death, and so can I, Xu Yan.</a>
                                </li>
                                <li>13 phút trước</li>
                            </ul>
                        </div>
                        <div class="wrap-delete">
                            <a href="javascript:confirmDelete('', '')" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Pages/Resources/views/products/library.blade.php ENDPATH**/ ?>