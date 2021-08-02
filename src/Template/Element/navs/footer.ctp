<section class="footer1 cid-sa6jXKqAqJ mbr-reveal" once="footer" id="footer1-d">
    <div class="align-left container">
        <div class="row justify-content-left">
            <div class="col-6">
                <div class="footer_wrap mbr-white">
                    <h4 class="mbr-fonts-style mbr-semibold footer_title display-7">Categories</h4>
                    <div>
                        <!-- Showing Limited Blog categories -->
                        <?php foreach ($blogCategories as $key => $blogCategory) : ?>
                            <p class="footer_items mbr-fonts-style display-4"><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'index',$blogCategory->category, $blogCategory->id]) ?>"><?= ucwords($blogCategory->category); ?></a></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="footer_wrap mbr-white">
                    <h4 class="mbr-fonts-style mbr-semibold footer_title display-7">Most Read</h4>
                    <div>
                        <!-- Showing Limited Blog Posts -->
                        <?php foreach ($blogPosts as $key => $blogPost) : ?>
                            <p class="footer_items mbr-fonts-style display-4"><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'index', 'post', $blogPost->id]) ?>"><?= $blogPost->title; ?></a></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <div class="row align-items-baseline">
            <div class="col-12 col-md-6">
                <p class="privacy mbr-fonts-style align-left display-4">Maven News</p>
            </div>
            <div class="col-12 col-md-6">
                <p class="privacy mbr-fonts-style align-right display-4">© <?= date("Y") ?> Maven News - All Rights Reserved</p>
            </div>
        </div>
    </div>
</section>

<?= $this->Html->script(['bootstrap-carousel-swipe', 'bootstrap.min', 'formoid.min', 'jarallax.min', 'jquery.datetimepicker.full', 'jquery.formstyler', 'jquery.formstyler.min', 'jquery.mb.vimeo_player', 'jquery.mb.ytplayer.min', 'jquery.min', 'jquery.touch-swipe.min', 'jquery.viewportchecker', 'nav-dropdown', 'navbar-dropdown', 'popper.min', 'smooth-scroll', 'tether.min']) ?>
<script src="<?= $this->Url->build('/') ?>/webroot/plugins/popup-overlay-plugin/js/script.js"></script>
<script src="<?= $this->Url->build('/') ?>/webroot/plugins/popup-plugin/js/script.js"></script>
<script src="<?= $this->Url->build('/') ?>/webroot/plugins/slidervideo-plugin/js/script.js"></script>
<script src="<?= $this->Url->build('/') ?>/webroot/plugins/theme-plugin/js/script.js"></script>

<?= $this->fetch('script') ?>
<input name="animation" type="hidden">