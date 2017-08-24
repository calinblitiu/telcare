<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 1:32 AM
 */
?>
<html>
<head>
    <title>Moke Up | Homea</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/mokup/mokup.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/global/plugins/bootstrap/css/bootstrap.min.css">
    <script src="<?=base_url()?>assets/global/plugins/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/global/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?=base_url()?>assets/mokup/mokup.js"></script>

</head>

<body>

    <div class="row mokup-border" style="height: 600px; margin: 0 10%;">
        <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png">
        <div style="position: absolute;top: 0;padding-left: 50%; width: 80%;">
            <div class="mokup-menu-item"><a href="<?=base_url()?>patient_portal">Patient Portal</a></div>
            <div class="mokup-menu-item"><a href="<?=base_url()?>provider_portal">Provider Portal</a></div>
            <div class="mokup-menu-item"><a href="<?=base_url()?>hospital">Hostpital</a></div>
            <div class="mokup-menu-item"><a href="<?=base_url()?>login">Login</a></div>
        </div>

        <div style="position: absolute;top: 30%;padding-left: 30%; width: 50%; text-align: center;">
            <h3>
                WELCOME TO TELE-ID AND eOPAT CONSULTATION
            </h3>
            <h6>Keeping You Healthy & Happy</h6>
            <a href="<?=base_url()?>signup" style="padding: 5px;" class="mokup-border-round"> Get Started Now </a><br><br>
            <i class="glyphicon glyphicon-facetime-video"></i><button class="mokup-border">Watch our video</button>
        </div>
    </div>

    <div style="margin: 50px 10%; text-align: center;" class="row">
        <span>Personalized Care and Guidance</span>
        <h3>SERVICES</h3>
    </div>

    <div class="row" style="margin: 50px 10%; text-align: center;">
        <div class="col-md-5">
            <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png" style="height: 200px;">
            <div style="margin-top: 50px; padding: 5px;">
                <h4>INFECTIOUS DISEASE CONSULTATION</h4>
                <h6>Here For You</h6>
                <span>
                    Keep yourself and your loved ones healthy! At Tele-ID, our friendly and experienced staff will make sure you always feel comfortable and well-informed.
                    Schedule your Specilialty Care Clinics today for the whole family and see how our team of qualified professionals can get you or your loved ones feeling greate.
                </span>
            </div>
        </div>

        <div class="col-md-offset-2 col-md-5">
            <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png" style="height: 200px;">
            <div style="margin-top: 50px; padding: 5px;">
                <h4>eOPAT</h4>
                <h6>Your Infusion Care</h6>
                <span>
                    Here at eOPAT, our experienced infusion nurses will follow your treatment and daily progresses, paired with point-of-care technologies that allows clinician access to patient data 24/7 from anywhere.
                </span>
            </div>
        </div>

    </div>

    <div class="row" style="margin: 50px 10%; text-align: center;">
        Call and Schedule an appointment with a member of our  medical staff today and see what they can for you!
    </div>
    <div class="row" style="margin: 50px 10%; text-align: center; height: 200px;">
        <div class="col-md-6" style="margin: 0;padding: 0!important;">
            <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png">
        </div>
        <div class="col-md-6 mokup-border" style="margin: 0;height: 200px;">
            <br><br><br>
            <h5>OPENING HOURS</h5>
            <h6>Mon - Fri : 9 am- 6 am</h6>
            <span> After hours are  only for urgent issue</span><br>
            <button class="mokup-border-round">Request an Appointment</button>
        </div>

    </div>


    <div class="row" style="margin: 50px 10%; text-align: center; padding: 0 10%;">
        <span class="mokup-border" style="font-size:20px;font-weight: 700; width: 20%;">CONTACT US</span>
        <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/noimage.png" style="height: 200px;margin-top: 50px;">
        <p style="margin-top: 50px;">
            <input type="text" value="NAME" style="width: 45%;float: left;" class="mokup-border">
            <input type="email" value="EMAIL" style="width: 45%; float: right;" class="mokup-border">
        </p>
        <input type="text" value="SUBJECT" style="margin-top: 20px; width: 100%;" class="mokup-border">
        <input type="text" value="PHONE" style="margin-top: 20px; width: 100%;" class="mokup-border">
        <input type="text" value="ADDRESS" style="margin-top: 20px; width: 100%;" class="mokup-border">
        <textarea style="margin-top: 20px; width: 100%; height: 100px;" class="mokup-border">Message</textarea>

        <button style="margin-top: 20px; width: 100%;padding: 5px;background-color: red;" class="mokup-border">SEND</button>

    </div>

</body>
</html>