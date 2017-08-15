<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/15/2017
 * Time: 1:42 PM
 */?>

<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Log In Patient
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" action="<?=base_url()?>login_patient" method="post" id="patient-login-form">
                    <div class="form-body">

                        <div class="form-group has-success">
                            <label class="control-label">Input E-mail Address</label>
                            <input type="email" class="form-control" id="patient_signup_email" name="email" placeholder="Email Address">
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Input Password</label>
                            <input type="password" class="form-control" id="patient_signup_pwd" name="pwd" placeholder="Password">
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="reset" class="btn default">Reset</button>
                        <button type="button" class="btn red patient-login-btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url()?>assets/myjs/loginPatient.js" type="text/javascript"></script>

