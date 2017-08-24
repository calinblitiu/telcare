<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 7:38 AM
 */?>
<html>
<head>
    <title>Moke Up | Refering Physician Signup</title>
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


<div class="row" style=" margin: 50px 10%; padding: 0 5%;text-align: center;">

    <span class="" style="font-size: 15px;padding: 5px;">Easy and Convinent</span>
    <span class="mokup-border" style="font-size: 15px;padding: 20px;">We will contact you same day with login/password information.</span><br>
    <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="First Name">
    <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Last Name">
    <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Office Phone">
    <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Office Fax">
    <input type="email" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Email Address">
    <select class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;">
        <option>State(drop down menu)</option>
    </select>
    <select class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;">
        <option>Provider type(drop down menu-MD, DO, ARNP, PA)</option>
    </select>
    <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="NPI">
    <textarea class="mokup-border" style="width: 80%;margin: 30px 0; height: 200px;">
        Message
    </textarea><br>

    <button class="mokup-border-round">Send Request</button>

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    footer
</div>


</body>