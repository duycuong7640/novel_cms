<section>
    <div class="wrap-novel-ranking bg-opacity radius">
        <label class="title">Novels Ranking</label>
        <div class="wrap-tabs">
            <div class="tabs-novel">
                <button type="button" id="day" class="bg-opacity-opa radius active">Day</button>
                <button type="button" id="week" class="bg-opacity-opa radius">Week</button>
                <button type="button" id="month" class="bg-opacity-opa radius">Month</button>
            </div>
            <div class="wrap-content-tab">
                <div id="day-tab">
                    <?php for($i=0; $i<=4; $i ++): ?>
                        <div class="item">
                            <div class="img">
                                <a href="" title="">
                                    <i class="cover"
                                       style="background-image: url('http://novelcms:8888/storage/photos/images/s1.png')"></i>
                                </a>
                            </div>
                            <div class="info-novel">
                                <a href="" title="">Black Knight From Blue Star Black Knight From Blue Star Black
                                    Knight From Blue Star</a>
                                <p class="view">
                                    <i class="fas fa-eye"></i> 840K views
                                </p>
                                <p class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    4.5
                                </p>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="a-thumbnail">
        <a href="" title="">
            <img src="<?php echo e(asset('static/web/images/ads2.png')); ?>" title="" alt=""/>
        </a>
    </div>
    <div class="wrap-novel-recommendation bg-opacity radius">
        <label class="title">Recommendation</label>
        <div class="wrap-content-recommendation">
            <?php for($i=0; $i<=9; $i ++): ?>
                <div class="item">
                    <div class="img">
                        <a href="" title="">
                            <i class="cover"
                               style="background-image: url('http://novelcms:8888/storage/photos/images/s1.png')"></i>
                        </a>
                    </div>
                    <div class="info-novel">
                        <a href="" title="">Black Knight From Blue Star Black Knight From Blue Star Black
                            Knight From Blue Star</a>
                        <p class="view">
                            <i class="fas fa-eye"></i> 840K views
                        </p>
                        <p class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            4.5
                        </p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Pages/Resources/views/elements/sitebar-right.blade.php ENDPATH**/ ?>