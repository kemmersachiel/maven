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
 * @var \App\View\AppView $this
 */
$appDescription = 'Maven News - Get the latest Breaking news, sport, TV, radio and a whole lot more';
?>
<!DOCTYPE html>
<html  >
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <title><?= $appDescription ?>: <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->meta('keywords', ['content' => 'Search, Mavin News']) ?>
    <?= $this->Html->meta('description', ['content' => $appDescription]) ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="preload" as="style" href="<?= $this->Url->build('/') ?>/webroot/css/mbr-additional.css">
    <link rel="stylesheet" href="<?= $this->Url->build('/') ?>/webroot/plugins/theme-plugin/css/style.css">
    <link rel="stylesheet" href="<?= $this->Url->build('/') ?>/webroot/plugins/socicon-plugin/css/style.css">
    <link rel="stylesheet" href="<?= $this->Url->build('/') ?>/webroot/plugins/dropdown-plugin/css/style.css">

    <?= $this->Html->css(['animate', 'bootstrap-reboot.min', 'bootstrap-reboot.min', 'bootstrap.min', 'jquery.datetimepicker.min', 'jquery.formstyler', 'jquery.formstyler.theme', 'material', 'mbr-additional', 'mobirise-icons', 'mobirise2', 'recaptcha', 'tether.min']) ?>
    <?= $this->Html->css('mbr-additional', ['type' => 'text/css']) ?>
    <?= $this->Html->script('lazyload') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->element('navs/header') ?>
<main>
    <?= $this->fetch('content') ?>
</main>
<footer>
<?= $this->element('navs/footer') ?>
</footer>
</body>
</html>
