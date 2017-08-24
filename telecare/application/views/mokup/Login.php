<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 5:47 AM
 */?>
<html>
<head>
    <title>Moke Up | Login</title>
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


<div class="row" style=" margin: 50px 10%;text-align: center;">
  <h2><i class="mokup-border" style="padding:0 15px;width: 50px;height: 50px; margin-right: 50px;"> </i>Welcome to Tele-ID, your personalized infectious disease care</h2>
</div>

<div class="row" style="height: 300px; margin: 50px 10%; ">

  <div class="col-md-5" style="height: 100%; padding: 0;">
      <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png">
  </div>
  <div class="col-md-5 col-md-offset-2 mokup-border" style="height: 100%;">
        <span class="mokup-border">Log in</span><br>
        <input type="text" class="mokup-border" placeholder="Email" style="margin-top: 50px;width: 100%"><br>
        <input type="text" class="mokup-border" placeholder="Email" style="margin-top: 30px;width: 100%"><br>
        <span style="margin-top: 50px;">Forgot Password</span><br>
      <p style="text-align: center;">
        <button class="mokup-border-round" style="margin-top: 50px;padding: 5px 20px;">Login</button><br>
      </p>
      <span class="mokup-border" style="margin-top: 50px;position: absolute;bottom: 0;right: 0;">Don't have an account? Sign Up</span>
  </div>
</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    footer
</div>


</body>
