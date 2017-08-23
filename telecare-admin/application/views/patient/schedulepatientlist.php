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
            <i class="fa fa-users"></i> Schedule Patient List
        </h1>
    </section>
    <section class="content">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Thumb</th>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Dob</th>
                                <th>Ssn</th>
                                <th>Address</th>
                                <th>Doctor</th>
                            </tr>

                            <?php if(count($schedulepatients)<=0):?>
                            <h1>There is not any patients</h1>
                            <?php elseif(count($schedulepatients)>0):?>
                                <?php $i = 0;?>
                                <?php foreach ($newpatients as $patient):?>
                                    <?php $i++;?>
                                    <tr>
                                        <th><?=$i?></th>
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
                                        <th><img src="<?=$patient_thumb?>" style="width: 100px;"></th>
                                        <th><?=$patient['email']?></th>
                                        <th><?=$patient['fname']?></th>
                                        <th><?=$patient['lname']?></th>
                                        <th><?=$patient['gender']?></th>
                                        <th><?=$patient['dob']?></th>
                                        <th><?=$patient['ssn']?></th>
                                        <th><?=$patient['addr']?></th>
                                        <th> <a class="btn btn-sm btn-info" href="<?=base_url()?>schedulepatient/<?=$patient['pid']?>"><i class="fa fa-pencil"></i></a></th>
                                        
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>

                        </table>

                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">

                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>


