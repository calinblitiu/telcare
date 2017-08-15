<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/15/2017
 * Time: 11:03 AM
 */?>

<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Sign Up Patient
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" action="<?=base_url()?>signup_patient" method="post" enctype='multipart/form-data' id="patient-signup-form">
                    <div class="form-body">

                        <div class="form-group has-success">
                            <label class="control-label">Input First Name</label>
                            <input type="text" class="form-control" id="patient_signup_first_name" name="fname"  placeholder="Firt Name">
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Input Last Name</label>
                            <input type="text" class="form-control" id="patient_signup_last_name" name="lname"  placeholder="Last Name">
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Date of Birthday</label>
                            <input type="text" class="form-control" id="patient_signup_dob" name="dob" placeholder="Date of Birthday">
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Input E-mail Address</label>
                            <input type="email" class="form-control" id="patient_signup_email" name="email" placeholder="Email Address">
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Input Social Security Number</label>
                            <input type="number" class="form-control" id="patient_signup_ssn" name="ssn" placeholder="Input Social Security Number">
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Input Patient Address</label>
                            <input type="text" class="form-control" id="patient_signup_lang" name="addr" placeholder="Input Patient Address">
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Input Password</label>
                            <input type="password" class="form-control" id="patient_signup_pwd" name="pwd" placeholder="Password">
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Input Confirm Password</label>
                            <input type="password" class="form-control" id="patient_signup_cir_pwd" name="re-pwd" placeholder="Confirm Password">
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Select Gender</label>
                            <select class="form-control" name="gender" id="patient_signup_type">
                                <option value="<?=GENDER_MALE?>">male</option>
                                <option value="<?=GENDER_FEMALE?>">female</option>
                            </select>
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Select Image</label>
                            <input type="file" class="form-control" id="patient_signup_img" name="img" >
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="reset" class="btn default">Reset</button>
                        <button type="button" class="btn red signup-patient-btn">SignUp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url()?>assets/myjs/signUpPatient.js" type="text/javascript"></script>