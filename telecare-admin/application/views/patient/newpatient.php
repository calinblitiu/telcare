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
                   <div class="well">NAME : <?=$patient['fname']?> <?=$patient['lname']?></div>
                   <div class="well">GENDER : <?php if($patient == GENDER_MALE){echo "Male";}else{echo "Femail";}?></div>
                   <div class="well">DOB : <?=$patient['dob']?></div>
                   <div class="well">SSN : <?=$patient['ssn']?></div>
                   <div class="well">Address : <?=$patient['addr']?></div>
                   <div class="well">EMAIL : <?=$patient['email']?></div>
                   <div class="well">Doctor : 
                        <select id="" name="">
                        </select>
                   </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>


