<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 7:24 AM
 */?>
<html>
<head>
    <title>Moke Up |  Provider Registeration</title>
    <?php $this->load->view('mokup/layout/common')?>
</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 50px 10% 0 10%;text-align: center;">
    Header
</div>


<div class="row" style=" margin: 50px 10%; padding: 0 5%;text-align: center;">
    <form role="form" action="<?=base_url()?>signup_doctor" method="post" enctype='multipart/form-data' id="doctor-signup-form">
        <span class="mokup-border" style="font-size: 15px;padding: 5px;">Provider Registeration</span><br><br>
        <span class="mokup-border" style="font-size: 15px;padding: 10px;">Tele-ID will contact you within 24hours with login/password information</span><br>
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="First Name"  id="doctor_signup_first_name" name="fname">
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Last Name"  id="doctor_signup_last_name" name="lname">
        <input type="email" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Email Address" id="doctor_signup_email" name="email">
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Office Phone" id="doctor_signup_phone" name="phone">
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="Office Fax" id="doctor_signup_fax" name="fax">
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="NPI" id="doctor_signup_npi" name="npi" placeholder="NPI">
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="State Licence Number" id="doctor_signup_state" name="state">
        <input type="text" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" placeholder="DEA" id="doctor_signup_dea" name="dea">
        <div style="position: relative;">
            <input type="file" class="mokup-border" style="padding: 10px;width: 100%;margin: 30px 0;" value="CV Upload" name="cv">
            <span style="position: absolute;top: 7px;right: 15px;">CV upload</span>
        </div>
        <span class="mokup-border-round btn btn-default send-request-btn">Send Request</span>
    </form>
</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    footer
</div>

<script>
    $('.send-request-btn').click(function(){
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