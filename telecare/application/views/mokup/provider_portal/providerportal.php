<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 5:26 AM
 */?>
<html>
<head>
    <title>Moke Up | Provider Portal</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/mokup/mokup.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/global/plugins/bootstrap/css/bootstrap.min.css">
    <script src="<?=base_url()?>assets/global/plugins/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/global/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?=base_url()?>assets/mokup/mokup.js"></script>

</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 50px 10% 0 10%;text-align: center">
    Header
</div>
<div class="row" style="height: 300px; margin: 50px 10%;">
    <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png">

</div>
<div class="row" style="height: 300px; margin: 50px 10%; padding: 0 10%;">

    <div class="col-md-3 mokup-border" style="height: 100%;padding: 0;text-align: center;">
        <div style="position: absolute;top: 50%;padding: 0 20%;">
            <a href="<?=base_url()?>provider_infectious">infectious disease consultant</a>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-1 mokup-border" style="height: 100%;padding: 0;text-align: center;">
        <div style="position: absolute;top: 50%;text-align: center;width: 100%;">
            <a href="<?=base_url()?>">Refering provider</a>
        </div>
    </div>

    <div class="col-md-3 col-md-offset-1 mokup-border" style="height: 100%;padding: 0;text-align: center;">
        <div style="position: absolute;top: 50%;text-align: center;width: 100%;">
            <a href="<?=base_url()?>">Hospital</a>
        </div>
    </div>

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    footer
</div>


</body>