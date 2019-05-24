<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = '';
?>
<!DOCTYPE html>
<html>

<head>
    <!--<style>
            .loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('../img/loader.gif') 50% 50% no-repeat rgb(249,249,249);
    }
        </style>-->
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        iProats
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?php
        // add our javascripts
        //echo $this->Html->script('api');
        echo $this->Html->script('jquery-1-10-2.min');
        //echo $this->Html->script('jquery.infinitescroll.min');
        //echo $this->Html->script('jquery_ui');
    ?>
    <!--<script type="text/javascript">
    $(window).load(function() {
            $(".loader").fadeOut("slow");
    })
    </script>-->
</head>

<body>
    <!--<div class="loader"></div>-->
    <div id="container">
        <div id="content">
            <div class="message success" align='center' style="font-size: 16px;color:white;"><?= $this->Flash->render() ?>
            </div>
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
        </footer>
    </div>
</body>

</html>