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
    <title>Moke Up | Home</title>
    <?php $this->load->view('mokup/layout/common')?>

</head>

<body>

    <div class="row mokup-border" style="height: 900px; margin: 5% 10%; position: relative;text-align: center;">
        <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/images/1.jpeg">
        <img src="<?=base_url()?>assets/mokup/logo.png" style="position: absolute;top: 10px;left: 10px;" class="mokup-border">
        <div style="position: absolute;top: 20px;right: 10%; ">
            <div class="mokup-menu-item"><a href="<?=base_url()?>patient_portal">Patient Portal</a></div>
            <div class="mokup-menu-item"><a href="<?=base_url()?>provider_portal">Provider Portal</a></div>
            <div class="mokup-menu-item"><a href="<?=base_url()?>hospital">Hostpital</a></div>
            <div class="mokup-menu-item"><a href="<?=base_url()?>login">Login</a></div>
        </div>

        <div style="position: absolute;top: 30%; text-align: center;text-align: center; width: 100%;padding: 5% 30%;background: rgba(255,255,255,0);">
            <h3>
                WELCOME TO TELE-ID AND eOPAT CONSULTATION
            </h3>
            <h6>Keeping You Healthy & Happy</h6>
            <a href="<?=base_url()?>signup" style="padding: 5px;" class="mokup-border-round"> Get Started Now </a><br><br>
            <i class="glyphicon glyphicon-facetime-video"></i><button class="mokup-border" style="margin-left: 5%;" id="watch-video">Watch our video</button>
        </div>
    </div>

    <div style="margin: 50px 10%; text-align: center;" class="row">
        <span>Personalized Care and Guidance</span>
        <h3>SERVICES</h3>
    </div>

    <div class="row" style="margin: 50px 10%; text-align: center;">
        <div class="col-md-5">
            <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/images/6.jpeg" style="height: 300px;">
            <a href="<?=base_url()?>service_consultorsecondopinion" style="margin-top: 50px; padding: 5px;">
                <h4>INFECTIOUS DISEASE CONSULTATION</h4>
                <h6>Here For You</h6>
                <span>
                    Keep yourself and your loved ones healthy! At Tele-ID, our friendly and experienced staff will make sure you always feel comfortable and well-informed.
                    Schedule your Specilialty Care Clinics today for the whole family and see how our team of qualified professionals can get you or your loved ones feeling greate.
                </span>
            </a>
        </div>

        <div class="col-md-offset-2 col-md-5">
            <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/images/3.jpeg" style="height: 300px;">
            <a href="<?=base_url()?>service_eopat" style="margin-top: 50px; padding: 5px;">
                <h4>eOPAT</h4>
                <h6>Your Infusion Care</h6>
                <span>
                    Here at eOPAT, our experienced infusion nurses will follow your treatment and daily progresses, paired with point-of-care technologies that allows clinician access to patient data 24/7 from anywhere.
                </span>
            </a>
        </div>

    </div>

    <div class="row" style="margin: 50px 10%; text-align: center;">
        Call and Schedule an appointment with a member of our  medical staff today and see what they can for you!
    </div>
    <div class="row" style="margin: 50px 10%; text-align: center;">
        <a href="<?=base_url()?>contact_us" class="mokup-border-round" style="padding: 5px; font-size: 20px;"> REQUEST A CONSULTATION</a>
    </div>
    <div class="row" style="margin: 50px 10%; text-align: center; height: 400px;">
        <div class="col-md-6" style="margin: 0;padding: 0!important;">
            <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/images/4.jpg">
        </div>
        <div class="col-md-6 mokup-border" style="margin: 0;height: 400px;">
            <br><br><br>
            <h5>OPENING HOURS</h5>
            <h6>Mon - Fri : 9 am- 6 am</h6>
            <span> After hours are  only for urgent issue</span><br>
            <a href="<?=base_url()?>contact_us" class="mokup-border-round">Request an Appointment</a>
        </div>

    </div>


    <div class="row" style="margin: 50px 10%; text-align: center; padding: 0 10%;">
        <a href="<?=base_url()?>contact_us" class="mokup-border" style="font-size:20px;font-weight: 700; width: 20%;">CONTACT US</a>
        <img class="mokup-no-imag" src="<?=base_url()?>assets/mokup/images/17.jpeg" style="height: 200px;margin-top: 50px;border: 0;">
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

    <div class="row mokup-border" style="height: 30%; margin: 0 10% 50px 10%; text-align: center">
        <span>Footer</span><br><br>
        <span>About Us</span><span style="margin-left: 10%;">Our Team</span><br><br>
        <span>Directory</span><span style="margin-left: 10%;">Telemedicine</span><br><br>
        <span>FAQ</span><span style="margin-left: 10%;">Privacy Policy</span><br><br>
        <span>request a demo</span><span style="margin-left: 10%;">Terms and Condition</span><br><br>

    </div>



    <!-- Modal -->
    <div class="modal " id="youtube-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="" id="modal-video">
            <div class="modal-content">

                    <button type="button" class="close" data-dismiss="modal" style="position: absolute;top:-12px;right: -40px;color: white;font-size: 50px;font-weight: 100;opacity: 1;">&times;</button>

                <div class="modal-body" style="padding: 0;">

                    <iframe id="iframeYoutube"  src="" frameborder="0" allowfullscreen style="width: 100%;height: 100%; "></iframe>
                </div>
            </div>
        </div>
    </div>
<script>
    $('#watch-video').click(function (ev) {
        var video = $('#youtube-modal').modal();
        var video_frame = $("#iframeYoutube");
        video_frame[0].src = "https://www.youtube.com/embed/XevNMhLfhR0?rel=0&version=3&enablejsapi=1&autoplay=1";
        ev.preventDefault();
        video.on('hidden.bs.modal',function () {
            video_frame[0].src = "";
        })
    });

    var old_width = $(window).width();
    var old_height = $(window).height();
    var modal_video = $("#modal-video");

    var width  = $(window).width();
    var height = $(window).height();
    modal_video.css({"width":width/2+"px","height":280/500*width/2+"px", "margin-top" : (height-280/500*width/2)/10+"px"});
    $(window).on('resize',function () {
        var width  = $(window).width();
        var height = $(window).height();
        modal_video.css({"width":width/2+"px","height":280/500*width/2+"px", "margin-top" : (height-280/500*width/2)/10+"px"});
    });


</script>
</body>
</html>