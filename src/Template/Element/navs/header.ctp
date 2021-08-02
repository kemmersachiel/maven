<section class="extMenu7 menu cid-ssFxqgDva2" once="menu" id="extMenu7-2v">
    <nav class="navbar navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <div class="menu-content-top" id="topLine">
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a hidden href=<?= $this->Url->build('/') ?>>
                            <img src="<?= $this->Url->build('/') ?>/webroot/img/logo1.png" alt="" style="height: 3.8rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><a href=<?= $this->Url->build('/') ?> class="brand-link mbr-black text-warning display-7"> Maven News</a></span>
                </div>
            </div>
            <div class="menu-content-right">
                <div class="info-widget">
                    <a href="<?= $this->Url->build('/') ?>" data-toggle="modal" data-target="#mbr-popup-2x"><span class="widget-icon mbr-iconfont mdi-action-search"></span></a>
                    <div class="widget-content display-4">
                        <p hidden class="widget-title mbr-fonts-style display-4"><a href="#" data-toggle="modal" data-target="#mbr-popup-2x">Search</a></p>
                        <p hidden="" class="widget-text mbr-fonts-style display-4">Sub-text</p>
                    </div>
                </div>
                <div class="info-widget">
                    <span hidden="" class="widget-icon mbr-iconfont mdi-communication-call"></span>
                    <div class="widget-content display-4">
                        <p class="widget-title mbr-fonts-style display-4"><a href=<?= $this->Url->build('/') ?> class="nav-link link text-primary display-4">About Us</a></p>
                        <p hidden="" class="widget-text mbr-fonts-style display-4">Sub-text</p>
                    </div>
                </div>
                <div class="info-widget">
                    <span hidden="" class="widget-icon mbr-iconfont mdi-action-schedule"></span>
                    <div class="widget-content display-4">
                        <p class="widget-title mbr-fonts-style display-4"><a href=<?= $this->Url->build('/') ?> class="nav-link link text-primary display-4">Contact Us</a></p>
                        <p hidden="" class="widget-text mbr-fonts-style display-4">Sub-text</p>
                    </div>
                </div>
            </div>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent, #topLine" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
        <div class="menu-bottom">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown js-float-line" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link mbr-black display-4" href="<?= $this->Url->build('/') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link mbr-black display-4" href="<?= $this->Url->build('/') ?>">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link mbr-black display-4" href="<?= $this->Url->build('/') ?>">Sport</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link mbr-black display-4" href="<?= $this->Url->build('/') ?>">Travel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link mbr-black display-4" href="<?= $this->Url->build('/') ?>">Future</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link mbr-black display-4" href="<?= $this->Url->build('/') ?>">Culture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link mbr-black display-4" href="<?= $this->Url->build('/') ?>">Music</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link mbr-black display-4" href="<?= $this->Url->build('/') ?>">Weather</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link mbr-black display-4" href="<?= $this->Url->build('/') ?>">Work Life</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link link mbr-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">More</a>
                        <div class="dropdown-menu">
                            <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/') ?>">Business</a>
                            <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/') ?>">Health</a>
                            <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/') ?>">Sounds</a>
                            <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/') ?>">Stories</a>
                            <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/') ?>">Technology</a>
                            <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/') ?>">TV</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link link mbr-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false"><?php if (!$logged_in) : ?><span class="mdi-action-account-circle mbr-iconfont mbr-iconfont-btn"></span>Account<?php else : ?>Welcome <?php echo $current_user['name']; ?><?php endif; ?></a>
                        <div class="dropdown-menu">
                            <?php if (!$logged_in) : ?>
                                <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/login') ?>"><span class="mdi-action-lock mbr-iconfont mbr-iconfont-btn"></span>Log In</a>
                                <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/register') ?>"><span class="mdi-social-person-add mbr-iconfont mbr-iconfont-btn"></span>Register</a>
                            <?php else : ?>
                                <a hidden class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/dashboard') ?>"><span hidden class="mdi-action-lock mbr-iconfont mbr-iconfont-btn"></span>Dashboard</a>
                                <?php if ($current_user['role'] == 'admin') : ?>
                                    <a hidden class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/manage-users') ?>"><span hidden class="mdi-action-lock mbr-iconfont mbr-iconfont-btn"></span>Manage Users</a>
                                    <!-- <div class="dropdown"> -->
                                    <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/posts/index') ?>"><span hidden class="mdi-social-person-add mbr-iconfont mbr-iconfont-btn"></span>Manage Posts
                                    </a>
                                    <div hidden class="dropdown-menu dropdown-submenu">
                                        <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/posts/add') ?>">Create Posts</a>
                                        <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/posts/index') ?>">Manage Posts</a>
                                    </div>
                                    <!-- </div> -->
                                <?php endif; ?>
                                <a hidden class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/my-account') ?>"><span hidden class="mdi-social-person-add mbr-iconfont mbr-iconfont-btn"></span>My Account</a>
                                <a class="mbr-black dropdown-item display-4" href="<?= $this->Url->build('/logout') ?>"><span hidden class="mdi-social-person-add mbr-iconfont mbr-iconfont-btn"></span>Logout</a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
                <?php if ($logged_in) : ?>
                    <div hidden class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-warning-outline display-4" href="<?= $this->Url->build('/logout') ?>">Logout</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="display-7 align-center text-warning" style="padding-top: 0px;">
            <?= $this->Flash->render() ?>
        </div>
    </nav>
</section>