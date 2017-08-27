<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 7:20 AM
 */?>
<html>
<head>
    <title>Moke Up | Provider Portal</title>
    <?php $this->load->view('mokup/layout/common')?>

</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 50px 10% 0 10%;text-align: center">
    Header
</div>
<div class="row" style="height: 300px; margin: 50px 10%;">
    <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png">

</div>
<div class="row" style="height: 300px; margin: 50px 10%; padding: 0 10%;text-align: center;">

    <div class="mokup-border" style="padding: 5% 50px;width:50%;margin: 0 25%;text-align: center">
        Refer your patient for easier and faster infectious disease consultaion<br><br><br>

        sign up create your own dashboard to upload patient's data in our private HIPAA Compliant webportal at your convenience.<br>
        or<br>
        Call/chat with our Coordinator who will assist you in obtaining required consultation service
    </div>
    <br>
    <a class="mokup-border" style="padding: 10px 50px;" href="<?=base_url()?>provider_refering_physician_singup">Join Us and refer your patient</a>

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    footer
</div>
</body>