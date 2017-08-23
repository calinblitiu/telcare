<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/23/2017
 * Time: 10:44 AM
 */?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> New Patient
        </h1>
    </section>
    <section class="content">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                   <div class="well">
                       <?php
                            $patient_thumb = $patient['img'];
                            if($patient_thumb == "" || $patient_thumb == null)
                            {
                                $patient_thumb = FRONTEND_SITE_URL."assets/uploads/patient/no-img.png";
                            }
                            else{
                                $patient_thumb = FRONTEND_SITE_URL."assets/uploads/patient/".$patient_thumb;
                            }
                       ?>
                       <img src="<?=$patient_thumb?>" style="width: 100px;">
                   </div>
                   <div class="well">NAME : <?=$patient['fname']?> <?=$patient['lname']?></div>
                   <div class="well">GENDER : <?php if($patient == GENDER_MALE){echo "Male";}else{echo "Femail";}?></div>
                   <div class="well">DOB : <?=$patient['dob']?></div>
                   <div class="well">SSN : <?=$patient['ssn']?></div>
                   <div class="well">Address : <?=$patient['addr']?></div>
                   <div class="well">EMAIL : <?=$patient['email']?></div>
                   <div class="well">Doctor : 
                        <select id="doctor_select" name="">
                            <?php foreach($doctors as $doctor):?>
                                <option value="<?=$doctor['did']?>"><?php echo $doctor['fname']." ".$doctor['lname'];?></option>
                            <?php endforeach;?>
                        </select>
                        <button id="save_doctor_btn" data-patient-id="">Save</button>
                   </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $("#save_doctor_btn").click(function(){
        var post_data = {
            did : $("#doctor_select").val(),
            pid : $("#save_doctor_btn").data("pid-patient-id")
        };

        $.ajax({
            url : baseURL+"setdidtopid",
            data : post_data,
            dataType : "json",
            type : "POST",
            success : function(data)
            {
                if(data.success == 1)
                {
                    alert("Doctor is set to this patient successfully");
                }
                else{
                    alert("Database transaction error");
                }
                location.reload();
            },
            fail : function(error){
                location.reload();
            }
        });
    });
</script>


