<!DOCTYPE html>
<html lang="en">

<head>
    <!--    <style>
            .loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('/ats/app/img/19.gif') 50% 50% no-repeat rgb(249,249,249);
}
        </style>-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Application Tracking System</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('sass-compiled.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>
    <!--<?= $this->Html->css('vendor/fontawesome/css/font-awesome.min.css') ?>-->
    <?= $this->Html->css('vendor/animate.css/animate.min.css') ?>
    <?= $this->Html->css('vendor/whirl/dist/whirl.css') ?>
    <?= $this->Html->css('vendor/weather-icons/css/weather-icons.min.css') ?>
    <?= $this->Html->css('app.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->css('theme-a.css') ?>
    <?= $this->Html->css('theme-b.css') ?>
    <?= $this->Html->css('theme-c.css') ?>
    <?= $this->Html->css('theme-d.css') ?>
    <?= $this->Html->css('theme-e.css') ?>
    <?= $this->Html->css('theme-f.css') ?>
    <?= $this->Html->css('theme-g.css') ?>
    <?= $this->Html->css('theme-h.css') ?>

    <?php
        // add our javascripts
        //echo $this->Html->script('api');
        echo $this->Html->script('jquery-1-10-2.min');
        echo $this->Html->script('jquery.infinitescroll.min');
        echo $this->Html->script('jquery_ui');
        echo $this->Html->script('modernizr');
        echo $this->Html->script('bootstrap');
        echo $this->Html->script('jquery.storageapi');
        echo $this->Html->script('jquery.easing');
        echo $this->Html->script('animo');
        echo $this->Html->script('jquery.slimscroll.min');
        echo $this->Html->script('screenfull');
        echo $this->Html->script('jquery.localize');
        echo $this->Html->script('demo-rtl');
        echo $this->Html->script('jquery.sparkline.min');
        echo $this->Html->script('jquery.flot');
        echo $this->Html->script('jquery.flot.tooltip.min');
        echo $this->Html->script('jquery.flot.resize');
        echo $this->Html->script('jquery.flot.pie');
        echo $this->Html->script('jquery.flot.time');
        echo $this->Html->script('jquery.flot.categories');
        echo $this->Html->script('jquery.flot.spline.min');
        echo $this->Html->script('jquery.classyloader.min');
        echo $this->Html->script('moment-with-locales.min');
        echo $this->Html->script('skycons');
        //echo $this->Html->script('demo-flot');
        echo $this->Html->script('app');
        //echo $this->Html->script('jquery');
        echo $this->Html->script('jquery.gmap.min');
    ?>
    <!--<script type="text/javascript">
    $(window).load(function() {
            $(".loader").fadeOut("slow");
    })
    </script>-->
</head>
<?php
$controller = $this->request->params['controller'];
$action = $this->request->params['action'];
?>

<body>
    <!--<div class="loader"></div>-->
    <?= $this->fetch('content') ?>
</body>

</html>