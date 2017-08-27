<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 9:18 AM
 */?>
<html>
<head>
    <title>Moke Up | Dashboard</title>
    <?php $this->load->view('mokup/layout/common')?>

</head>

<body>

<?php
var_dump($this->session);

?>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Header
</div>

<div class="row mokup-border" style="height: 70%; margin: 50px 10%;text-align: center;">
    <div class="col-md-10" style="height: 100%;padding: 0;">
        <div class="row" style="height: 35%;">
            <div class="col-md-3" style="height:100%;">
                <div class="mokup-border" style=" margin: 5%;">
                    <img src="<?=base_url()?>assets/uploads/patient/<?=$this->session->userdata("img")?>" style="width: 50%;float: left;">
                    <div style=";">
                    Welcome <?=$this->session->userdata("fname")." ".$this->session->userdata('lname')?> <br>
                    Email : <?=$this->session->userdata("email")?><br>
                    SSN : <?=$this->session->userdata("ssn")?><br>
                    Address : <?=$this->session->userdata("addr")?><br>
                    </div>
                </div>
            </div>
            <div class="col-md-9" style="height: 100%">
                <span class="mokup-border" style="margin:30%;">Session Code</span>
            </div>
        </div>
        <div class="row" style="height: 65%; margin: 0;">
            <div class="col-md-3 mokup-border" style="height: 100%;padding: 0;text-align: center">
                <div class="mokup-border" style="width: 80%; margin: 5%">Dashboard</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Waiting Room<br>
                    <span>Room1</span><br>
                    <span>Room1</span>
                </div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Upload</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Schedule appointment</div>

                <div class="mokup-border" style="width: 80%; margin: 5%; position: absolute; bottom: 5%;">Account Setting</div>
            </div>
            <div class="col-md-9" style="height: 100%;">
                <div class="row " style="height: 100%; padding:5%;">
                    <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png" style="">
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-2" style="height: 100%;padding: 0">
        <div class="" style="height: 20%; padding: 0;position: relative;">
            <img class="mokup-no-imag" src="<?=base_url()?>assets/uploads/doctor/<?=$doctor['img']?>" style="">
            <span style="position: absolute;top: 50%;left: 20%" class="mokup-border">ID Doctor</span>
        </div>
        <div style="height: 75%; padding: 0; margin-top: 10%; position: relative;" class="mokup-border">
            Chat
            <input type="text" class="mokup-border" style="width: 100%;position: absolute;bottom: 0;left: 0;height: 50px;" placeholder="Messaging">
        </div>
    </div>
</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Your Document
</div>

<div class="row mokup-border" style="width:60%;height: 30%; margin: 5% 20%; text-align: center;">
    Upload documents drag and drop
</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">

</div>

<div class="row mokup-border" style="width:60%;height: 30%; margin: 5% 20%; text-align: center;padding: 10%;">
    <span class="mokup-border" style="padding: 40px 1%;">Calendar</span>
</div>


</body>

