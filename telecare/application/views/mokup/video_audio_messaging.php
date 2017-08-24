<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 9:06 AM
 */?>
<html>
<head>
    <title>Moke Up | Video Audio Messaging</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/mokup/mokup.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/global/plugins/bootstrap/css/bootstrap.min.css">
    <script src="<?=base_url()?>assets/global/plugins/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/global/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?=base_url()?>assets/mokup/mokup.js"></script>

</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 50px 10% 0 10%;text-align: center;">
    Header
</div>
<div class="row" style="height: 80%; margin: 50px 10%;">
    <div class="col-md-8 mokup-border" style="height: 100%;padding: 0;">
        <div class="col-md-9" style="height: 100%;">
            <div class="row" style="height: 20%;">
                <div class="mokup-border" style="padding: 5% 5%;width: 20%; margin: 2% 7%">Patient Profile</div>
            </div>
            <div class="row" style="height: 80%;border-top: solid 1px black;">
                <div class="col-md-3" style="height: 100%;text-align: center">
                    <input type="file" class="mokup-border" style="margin-top: 15%;width: 100%;">
                    <div class="mokup-border" style="margin-top: 15%;width: 100%;">Account Setting</div>
                </div>
                <div class="col-md-9" style="height: 100%;border-left: solid 1px black;text-align: center;">
                    <div style="margin-top: 30%">patient</div>
                    <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png" style="height: 50%;">
                </div>
            </div>
        </div>
        <div class="col-md-3" style="height: 100%;border-left: solid 1px black;padding: 0">
            <div style="height: 20%; text-align: center;">

                    <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png">
                    <span class="mokup-border" style="position: absolute;top: 10%;left: 20%;">ID Doctor</span>

            </div>
            <div style="height: 20%; text-align: center;">
                <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png">
                <span class="mokup-border" style="position: absolute;top: 30%;left: 20%;">Added Person</span>
            </div>
            <div style="border-bottom:solid 1px black;height: 50%; text-align: center;">
                Patient/doctor chat<br>
                doctor...<br>
                patient...<br>
                doctor....<br>
                patient...<br>
            </div>
            <div style="height: 10%;">
                chat
            </div>
        </div>
    </div>
    <div class="col-md-4" style="height: 100%; text-align: center;padding: 5% 10%;">
        <div class="mokup-border" style="padding: 15% 10%;">Secure Streaming HIPPA Compliant</div>
        <div class="mokup-border" style="padding: 15% 10%;margin-top: 15%;">3 Way audio video interaction</div>
        <div class="mokup-border" style="padding: 15% 10%;margin-top: 15%;">Archiving Annotation</div>
    </div>
</div>


<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    footer
</div>


</body>
