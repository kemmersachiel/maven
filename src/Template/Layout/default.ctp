<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1>
                    <a class="right" href="<?= $this->Url->build('/') ?>"><span>Maven News</span></a>
                </h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="left">
            <li><?= $this->Html->link('About Us', ['controller' => 'Pages', 'action' => 'index', 'latestPost']); ?></li>
            <li><?= $this->Html->link('Contact Us', ['controller' => 'Pages', 'action' => 'index', 'latestPost']); ?></li>
            <li><?= $this->Html->link('Advertise With Us', ['controller' => 'Pages', 'action' => 'index', 'latestPost']); ?></li>
            <?php if(!$logged_in) : ?>
                <li><?= $this->Html->link('Login', ['controller' => 'login']); ?></li>
                <li><?= $this->Html->link('Register', ['controller' => 'register']); ?></li>
            <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="container clearfix">
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1>
                    <a href=""><?= $this->fetch('title') ?></a>
                </h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <?php if($logged_in) : ?>
                    <li hidden><?= $this->Html->link('Dashboard', ['controller' => 'dashboard']); ?></li>
                    <?php if ($current_user['role'] == 'admin'): ?>
                        <li><?= $this->Html->link('My Posts', ['controller' => 'posts/index', 'action' => 'index']); ?></li>
                    <?php endif; ?>
                    <li><?= $this->Html->link('Logout', ['controller' => 'logout']); ?></li>
                <?php endif; ?>
            </ul>
            <span class="right">Welcome, <?php echo $current_user['name']; ?> </span> 
        </div>
    </nav>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
