<section class="features3 cid-sa69ignI5y" id="features-news">
    <div class="container">
        <div class="mbr-section-head align-center mb-4">
            <h3 class="mbr-section-title mbr-fonts-style display-2">
                <?php if ($latestPosts) {?>
                <strong>Latest Blog Posts</strong></h3>
                <?php } else {?>
                <strong>Please Login and create a Post!</strong></h3>
                    <?php }?>
        </div>
        <div class="row">
            <!-- Show all posts for -->
            <?php foreach ($latestPosts as $key => $latestPost):
                if ($this->request->getSession()->read('secsCatName')) {
                    $categoryname = $this->request->getSession()->read('secsCatName');
                } else {
                    $categoryname = $latestPost->has('Categories') ? h($latestPost->Categories['category']): '';
                }
                 ?>
            <div class="item features-image сol-12 col-lg-3">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="<?= $this->Url->build('/') ?>/webroot/img/4-1200x800.jpg" alt="" title="">
                    </div>
                    <div class="item-content text-white">
                        <div>
                            <h5 class="item-subtitle mbr-semibold mbr-fonts-style display-4"><?= strtoupper($categoryname) ?></h5>
                            <h4 class="item-title mb-3 mbr-fonts-style display-7"><strong><?= h($latestPost->title) ?></strong></h4>
                        </div>
                        <div>
                        <div class="mbr-section-btn"><a class="btn btn-white-outline display-4" href=<?= $this->Url->build(['controller' => 'Pages', 'action' => 'index','post', $latestPost->id]) ?>>Read More
                        <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                        <!-- <span class="mbr-iconfont mdi-navigation-chevron-right"></span> --></a></div>
                            </div>
                    </div>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div>
</section>