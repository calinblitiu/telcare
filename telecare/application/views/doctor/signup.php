<div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="portlet box blue ">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-gift"></i> Sign Up Doctor
          </div>
          <div class="tools">
            <a href="" class="collapse" data-original-title="" title="">
            </a>
            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
            </a>
            <a href="" class="reload" data-original-title="" title="">
            </a>
            <a href="" class="remove" data-original-title="" title="">
            </a>
          </div>
        </div>
        <div class="portlet-body form">
          <form role="form" action="<?=base_url()?>signup_doctor" method="post" enctype='multipart/form-data' id="doctor-signup-form">
            <div class="form-body">
              <div class="form-group has-success">
                <label class="control-label">Doctor Type</label>
                  <select class="form-control" name="type" id="doctor_signup_type">
                      <option value="<?=DOCTOR_TYPE_ID_PYSICIAN?>">ID Physician</option>
                      <option value="<?=DOCTOR_TYPE_REFERING_PROVIDER?>">Refering Provider</option>
                  </select>
              </div>

              <div class="form-group has-success">
                <label class="control-label">Input First Name</label>
                <input type="text" class="form-control" id="doctor_signup_first_name" name="fname"  placeholder="Firt Name">
              </div>

              <div class="form-group has-success">
                <label class="control-label">Input Last Name</label>
                <input type="text" class="form-control" id="doctor_signup_last_name" name="lname"  placeholder="Last Name">
              </div>

              <!-- <div class="form-group has-success">
                <label class="control-label">Doctor Speciality</label>
                  <select class="form-control" id="doctor_signup_spec" name="doctor_signup_spec">
                      
                  </select>
              </div> -->

              <div class="form-group has-success">
                <label class="control-label">Doctor Speciality</label>
                  <input type="text" class="form-control" id="doctor_signup_spec" name="spec" placeholder="Doctor Speciality">
              </div>

              <div class="form-group has-success">
                <label class="control-label">Input E-mail Address</label>
                <input type="email" class="form-control" id="doctor_signup_email" name="email" placeholder="Email Address">
              </div>

              <div class="form-group has-success">
                <label class="control-label">Input State License</label>
                <input type="number" class="form-control" id="doctor_signup_state" name="state" placeholder="State License">
              </div>

              <!-- <div class="form-group has-success">
                <label class="control-label">Doctor Language</label>
                  <select class="form-control" id="doctor_signup_lang" name="doctor_signup_lang">
                      
                  </select>
              </div> -->

              <div class="form-group has-success">
                  <label class="control-label">Doctor Language</label>
                  <input type="text" class="form-control" id="doctor_signup_lang" name="lang" placeholder="Doctor Language">
              </div>

              <div class="form-group has-success">
                <label class="control-label">Input DEA</label>
                <input type="text" class="form-control" id="doctor_signup_dea" name="dea" placeholder="DEA">
              </div>

              <div class="form-group has-success">
                <label class="control-label">Input NPI</label>
                <input type="number" class="form-control" id="doctor_signup_npi" name="npi" placeholder="NPI">
              </div>

              <div class="form-group has-success">
                <label class="control-label">Input Password</label>
                <input type="password" class="form-control" id="doctor_signup_pwd" name="pwd" placeholder="Password">
              </div>

              <div class="form-group has-success">
                <label class="control-label">Input Confirm Password</label>
                <input type="password" class="form-control" id="doctor_signup_cir_pwd" name="pwd" placeholder="Confirm Password">
              </div>

              <div class="form-group has-success">
                <label class="control-label">Select Image</label>
                <input type="file" class="form-control" id="doctor_signup_img" name="img" >
              </div>

            </div>
            <div class="form-actions">
              <button type="reset" class="btn default">Reset</button>
              <button type="button" class="btn red signup-doctor-btn">SignUp</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<script src="<?=base_url()?>assets/myjs/signUpDoctor.js" type="text/javascript"></script>