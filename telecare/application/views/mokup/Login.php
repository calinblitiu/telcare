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
   <?php $this->load->view('mokup/layout/common')?>

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
      <form role="form" action="<?=base_url()?>login_patient" method="post" id="login-form">
        <span class="mokup-border">Log in</span><br>
        <input type="text" class="mokup-border" placeholder="Email" style="margin-top: 50px;width: 100%" id="patient_signup_email" name="email"><br>
        <input type="password" class="mokup-border" placeholder="Password" style="margin-top: 30px;width: 100%" id="patient_signup_pwd" name="pwd"><br>
        <span style="margin-top: 50px;">Forgot Password</span><br>
      <p style="text-align: center;">
        <span class="mokup-border-round patient-login-btn" style="margin-top: 50px;padding: 5px 20px;">Login</span><br>
      </p>
      <span class="mokup-border" style="margin-top: 50px;position: absolute;bottom: 0;right: 0;">Don't have an account? Sign Up</span>
      </form>
  </div>
</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    footer
</div>


<script>
    $('.patient-login-btn').click(function(){
        var email = $("#patient_signup_email").val();
        var pwd = $("#patient_signup_pwd").val();

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
</script>


</body>
