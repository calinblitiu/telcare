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
    <?php $this->load->view('mokup/layout/common')?>

</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 50px 10% 0 10%;text-align: center;">
    Header
</div>


<div class="row" style=" margin: 50px 10% 0 10%;text-align: center;">
    <form role="form" action="<?=base_url()?>login_patient" method="post" id="login-form">
        <div class="col-md-6"></div>
        <div class="col-md-2">
            <input class="mokup-border" type="email" placeholder="Email"  id="patient_login_email" name="email">
        </div>
        <div class="col-md-2"><input class="mokup-border" type="password" placeholder="Password" id="patient_login_pwd" name="pwd"></div>
        <div class="col-md-2" style="padding: 0;"><span class="mokup-border-round btn btn-default login-btn" style="width: 100%;">Login</span></div>
        <br><br>
        <span class="mokup-border col-md-2" style="float: right">Forgot Password</span>
    </form>
</div>

<div class="row" style="height: 500px; margin: 10px 10%; ">

   <a href="<?=base_url()?>video_audio_messaging" class="col-md-6 mokup-border" style="height: 100%;text-align: center;">
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
   </a>

    <div class="col-md-6 mokup-border" style="height: 100%;text-align: center;padding: 0 5%;">
        <br>
        <span class="mokup-border">Sign Up/Activate</span><br><br>
        <input type="text" class="mokup-border" placeholder="First Name" style="width: 45%" id="patient_signup_first_name" name="fname">
        <input type="text" class="mokup-border" placeholder="Last Name" style="width: 45%;" id="patient_signup_last_name" name="lname"><br><br>
        <span class="mokup-border" style="float: left;">Date of Birth</span><br><br>
        <select class="mokup-border" style="width: 30%;" id="patient-dod-month">
            <?php for ($i = 1;$i<=12;$i++){?>
                <option value="<?=sprintf("%02d",$i)?>"><?=sprintf("%02d",$i)?></option>
            <?php
            }
            ?>
        </select>
        <select class="mokup-border" style="width: 30%;" id="patient-dod-day">
            <?php for ($i = 1;$i<=31;$i++){?>
                <option value="<?=sprintf("%02d",$i)?>"><?=sprintf("%02d",$i)?></option>
            <?php
            }
            ?>
        </select>
        <select class="mokup-border" style="width: 30%;" id="patient-dod-year">
            <?php for ($i = 2017;$i>=1900;$i--){?>
                <option value="<?=$i?>"><?=$i?></option>
            <?php
            }
            ?>
        </select><br><br>
        <button class="mokup-border-round female-btn btn btn-default">Female</button>
        <button class="mokup-border-round male-btn btn btn-success" style="margin-left: 20%;">Male</button><br><br>
        <input type="email" class="mokup-border" placeholder="email address" style="width: 100%" id="patient_signup_email" name="email" placeholder="Email Address"><br><br>
        <input type="password" class="mokup-border" placeholder="New Password" style="width: 100%" id="patient_signup_pwd" name="pwd" placeholder="Password"><br><br>

        <div class="mokup-border-round btn btn-default signup-patient-btn">Create Account</div>

        <span class="mokup-border" style="position: absolute;bottom: 0;padding: 30px;">
            <a href="<?=base_url()?>terms_and_condition">Terms & Condition</a> &
            <a href="<?=base_url()?>privacy_policy">Privacy Policy</a>
        </span>

    </div>

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    footer
</div>


<script>
    var gender = "0";
    $('.login-btn').click(function(){
        var email = $("#patient_login_email").val();
        var pwd = $("#patient_login_pwd").val();

        if(email == "" || pwd == "")
        {
            alert("please enter all data");
            return;
        }

        $("#login-form").ajaxSubmit({
            url: baseURL + "login_patient",
            type: 'post',
            dataType: "json",
            success: function (data) {
                if (data.success == 1) {
                    location.href = baseURL+"patient_dashboard";
                }
                else if (data.success == 0) {
                    // alert(data.error);
                    $("#login-form").ajaxSubmit({
                        url: baseURL + "login_doctor",
                        type: 'post',
                        dataType: "json",
                        success: function (data) {
                            if (data.success == 1) {
                                location.href = baseURL+"dashboard";
                            }
                            else if (data.success == 0) {
                                alert("There is not user");
                            }
                        },
                        fail: function (err) {

                        }
                    });
                }
            },
            fail: function (err) {
                alert(err);
            }
        });
    });


    $('.signup-patient-btn').click(function(){
        var postdata = {
            fname : $("#patient_signup_first_name").val(),
            lname : $("#patient_signup_last_name").val(),
            email : $("#patient_signup_email").val(),
            pwd   : $("#patient_signup_pwd").val(),
            dob   : $("#patient-dod-year").val()+"-"+$("#patient-dod-month").val()+"-"+$("#patient-dod-day").val(),
            gender : gender
        };

        if(postdata.fname == "" || postdata.lanme == "" || postdata.email == "" || postdata.pwd == "")
        {
            alert("please input all data");
            return;
        }
        $.ajax({
            url: baseURL + "signup_patient",
            type: 'post',
            dataType: "json",
            data : postdata,
            success: function (data) {
                if (data.success == 1) {
                    alert("sign up success");
                }
                else if (data.success == 0) {
                    alert(data.error);
                }
            },
            fail: function (err) {
                alert();
            }
        });
    });

    $(".male-btn").click(function () {
        $(this).addClass("btn-success");

        $(".female-btn").removeClass("btn-success");
        $(".female-btn").addClass("btn-default");
        gender = 0;

    });
    $(".female-btn").click(function () {
        $(this).addClass("btn-success");
        $(".male-btn").removeClass("btn-success");
        $(".male-btn").addClass("btn-default");
        gender = 1;
    });

</script>

</body>