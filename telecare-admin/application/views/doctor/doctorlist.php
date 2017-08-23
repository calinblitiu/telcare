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
            <i class="fa fa-users"></i> Doctor List

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
                                <th>Spec</th>
                                <th>State</th>
                                <th>Lang</th>
                                <th>Dea</th>
                                <th>Npi</th>
                                <th>On Call Doctor</th>
                                <th>Type</th>
                            </tr>

                            <?php if(!$doctors):?>
                            <h1>There is not any doctor</h1>
                            <?php elseif($doctors):?>
                                <?php $i = 0;?>
                                <?php foreach ($doctors as $doctor):?>
                                    <?php $i++;?>
                                    <tr>
                                        <th><?=$i?></th>
                                        <?php
                                            $doctor_thumb = $doctor['img'];
                                            if($doctor_thumb == "" || $doctor_thumb == null)
                                            {
                                                $doctor_thumb = FRONTEND_SITE_URL."assets/uploads/doctor/no-img.png";
                                            }
                                            else{
                                                $doctor_thumb = FRONTEND_SITE_URL."assets/uploads/doctor/".$doctor_thumb;
                                            }
                                        ?>
                                        <th><img src="<?=$doctor_thumb?>" style="width: 100px;"></th>
                                        <th><?=$doctor['email']?></th>
                                        <th><?=$doctor['fname']?></th>
                                        <th><?=$doctor['lname']?></th>
                                        <th><?=$doctor['spec']?></th>
                                        <th><?=$doctor['state']?></th>
                                        <th><?=$doctor['lang']?></th>
                                        <th><?=$doctor['dea']?></th>
                                        <th><?=$doctor['npi']?></th>
                                        <th><?=$doctor['is_on_call_doctor']?></th>
                                        <th><?=$doctor['type']?></th>
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


