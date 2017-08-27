<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 9:16 AM
 */?>
<html>
<head>
    <title>Moke Up | Dashboard</title>
    <?php $this->load->view('mokup/layout/common')?>

</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Header
</div>

<div class="row mokup-border" style="height: 70%; margin: 50px 10%;text-align: center;">
    <div class="col-md-10" style="height: 100%;padding: 0;">
        <div class="row" style="height: 20%;">
            <div class="col-md-3" style="height:100%;">
                <div class="mokup-border" style=" margin: 5%;">
                    Welcome Dr.Raman <br>
                    Infectious Disease<br>
                    state:<br>
                    Phone
                </div>
            </div>
            <div class="col-md-9" style="height: 100%">
                <span class="mokup-border" style="margin:30%;">Session Code</span>
            </div>
        </div>
        <div class="row" style="height: 80%; margin: 0;">
            <div class="col-md-3 mokup-border" style="height: 100%;padding: 0;text-align: center">
                <div class="mokup-border" style="width: 80%; margin: 5%">Dashboard</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Waiting Room</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">My Active Ptient</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">New Patient</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">eOPAT Patient</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Discharged Patient</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Prior Consults</div>
                <div class="mokup-border" style="width: 80%; margin: 5%; position: absolute; bottom: 5%;">Account Setting</div>
            </div>
            <div class="col-md-9" style="height: 100%;">
                <div class="row mokup-border" style="height: 45%; margin:0 5% 5% 5%;">
                    <span>Upcoming appointment</span>
                </div>
                <div class="row mokup-border" style="height: 45%; margin: 5%;">
                    <span>Patient Communication</span>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-2" style="height: 100%;padding: 0">
        <div class="" style="height: 20%; padding: 0;position: relative;">
            <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png" style="">
            <span style="position: absolute;top: 50%;left: 20%" class="mokup-border">ID Doctor</span>
        </div>
        <div style="height: 20%; padding: 0; margin-top: 10%;" class="mokup-border">
            Calender5
        </div>
    </div>
</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Prior Consults
</div>

<div class="row mokup-border" style="height: 30%; margin: 0 10% 50px 10%;text-align: center;">
    Table Format<br><br>
    Date Duration Attachment
</div>

</body>
