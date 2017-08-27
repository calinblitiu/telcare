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
    <?php $this->load->view('mokup/layout/common')?>
</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 50px 10% 0 10%;text-align: center;">
    Header
</div>


<div class="row" style=" margin: 50px 10%; padding: 0 5%;text-align: center;">
    <form role="form" action="<?=base_url()?>signup_doctor" method="post" enctype='multipart/form-data' id="doctor-signup-form">
        <span class="" style="font-size: 15px;padding: 5px;">Easy and Convinent</span>
        <span class="mokup-border" style="font-size: 15px;padding: 20px;">We will contact you same day with login/password information.</span><br>
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="First Name"  id="doctor_signup_first_name" name="fname">
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Last Name"  id="doctor_signup_last_name" name="lname">
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Office Phone"  id="doctor_signup_phone" name="phone">
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Office Fax"  id="doctor_signup_fax" name="fax">
        <input type="email" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Email Address"  id="doctor_signup_email" name="email">
        <select class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" id="doctor_signup_state" name="state">
            <option value="state1">State1</option>
            <option value="state2">State2</option>
            <option value="state3">State3</option>
            <option value="state4">State4</option>
            <option value="state5">State5</option>
        </select>
        <select class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" id="doctor_signup_type" name="doctor_type">
            <option value="MD">MD</option>
            <option value="DO">DO</option>
            <option value="ARNP">ARNP</option>
            <option value="PA">PA</option>
        </select>
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="NPI" id="doctor_signup_npi" name="npi">
        <textarea class="mokup-border" style="width: 80%;margin: 30px 0; height: 200px;" id="doctor_signup_message" name="message" placeholder="Message"></textarea><br>

        <span class="mokup-border-round btn btn-default send-request-btn">Send Request</span>
    </form>

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    footer
</div>

<script>
    $('.send-request-btn').click(function(){

        var post_data = {
            fname : $("#doctor_signup_first_name").val(),
            lname : $("#doctor_signup_last_name").val(),
            email : $("#doctor_signup_email").val(),
            phone : $("#doctor_signup_phone").val(),
            fax   : $("#doctor_signup_fax").val(),
            npi   : $("#doctor_signup_npi").val()
        };

        if(post_data.fname == "" || post_data.lname  == "" || post_data.email == "" || post_data.phone == "" || post_data.fax == "" || post_data.npi == "")
        {
            alert("Please Input all data");
            return;
        }
        $("#doctor-signup-form").ajaxSubmit({
            url: baseURL + "signup_doctor",
            type: 'post',
            dataType: "json",
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

</script>

</body>