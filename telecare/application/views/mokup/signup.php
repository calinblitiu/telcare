<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 5:50 AM
 */?>
<html>
<head>
    <title>Moke Up | Sign Up</title>
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


<div class="row" style=" margin: 50px 10% 0 10%;text-align: center;">
    <div class="col-md-6"></div>
    <div class="col-md-2">
        <input class="mokup-border" type="email" placeholder="Email">
    </div>
    <div class="col-md-2"><input class="mokup-border" type="password" placeholder="Password"></div>
    <div class="col-md-2" style="padding: 0;"><button class="mokup-border-round" style="width: 100%;">Login</button></div>
    <br><br>
    <span class="mokup-border col-md-2" style="float: right">Forgot Password</span>
</div>

<div class="row" style="height: 500px; margin: 10px 10%; ">

   <div class="col-md-6 mokup-border" style="height: 100%;text-align: center;">
       <br>
        <span class="mokup-border">Connect with your Infectious Disease Doctor</span><br><br>
        <span class="mokup-border">Personalized Care and Guidance</span>
       <p style="margin-top: 50px;">
           <i class="glyphicon glyphicon-facetime-video" style="font-size: 50px;"></i>
           <span class="mokup-border" style="margin-left: 50%;padding-right: 50px;">Video</span><br>
           <i class="glyphicon glyphicon-plus-sign" style="font-size: 30px;"></i>
       </p>
       <p style="margin-top: 50px;">
           <i class="glyphicon glyphicon-volume-up" style="font-size: 50px;"></i>
           <span class="mokup-border" style="margin-left: 50%;padding-right: 50px;">Audio</span><br>
           <i class="glyphicon glyphicon-plus-sign" style="font-size: 30px;"></i>
       </p>

       <p style="margin-top: 50px;">
           <i class="glyphicon glyphicon-comment" style="font-size: 50px;"></i>
           <span class="mokup-border" style="margin-left: 50%;padding-right: 50px;">Messaging</span><br>

       </p>
   </div>

    <div class="col-md-6 mokup-border" style="height: 100%;text-align: center;padding: 0 5%;">
        <br>
        <span class="mokup-border">Sign Up/Activate</span><br><br>
        <input type="text" class="mokup-border" placeholder="First Name" style="width: 45%">
        <input type="text" class="mokup-border" placeholder="Last Name" style="width: 45%;"><br><br>
        <span class="mokup-border" style="float: left;">Date of Birth</span><br><br>
        <select class="mokup-border" style="width: 30%;">
            <option>Month</option>
        </select>
        <select class="mokup-border" style="width: 30%;">
            <option>Day</option>
        </select>
        <select class="mokup-border" style="width: 30%;">
            <option>Year</option>
        </select><br><br>
        <button class="mokup-border-round">Female</button>
        <button class="mokup-border-round" style="margin-left: 20%;">Male</button><br><br>
        <input type="email" class="mokup-border" placeholder="email address or mobile number" style="width: 100%"><br><br>
        <input type="password" class="mokup-border" placeholder="New Password" style="width: 100%"><br><br>

        <button class="mokup-border-round">Create Account</button>

        <span class="mokup-border" style="position: absolute;bottom: 0;padding: 30px;">Terms & Condition &
            <a href="<?=base_url()?>privacy_policy">Privacy Policy</a></span>

    </div>

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    footer
</div>


</body>
