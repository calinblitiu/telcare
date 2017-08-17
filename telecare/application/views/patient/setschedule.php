<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/18/2017
 * Time: 4:11 AM
 */
?>

<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Set Schedule
                </div>

            </div>
            <div class="portlet-body form">

                    <div class="form-body">
                        <form role="form" action="<?=base_url()?>set_schedule" method="post" id="patient-setschedule-form">
                        <input type="hidden" name="token" value="<?=$this->session->userdata('token')?>">
                        <div class="form-group has-success">
                            <label class="control-label">Input Date</label>
                            <input type="text" class="form-control" id="patient_schedule_date" name="date" placeholder="Schedule Date">
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label">Input Note</label>
                            <input type="text" class="form-control" id="patient_schedule_note" name="note" placeholder="Schedule note">
                        </div>

                        <div class="form-group has-success hide">
                            <label class="control-label">Input History</label>
                            <input type="text" class="form-control" id="patient_schedule_history" name="history" placeholder="Schedule History">
                        </div>

                    </div>
                    </form>
                    <form role="form" action="<?=base_url()?>upload_history_attach" method="post" id="patient-attach-form" enctype='multipart/form-data'>
                        <div class="form-group has-success">
                            <label class="control-label">Upload History File</label>
                            <input type="hidden" name="token" value="<?=$this->session->userdata('token')?>">
                            <input type="file" class="form-control" id="patient_schedule_file" name="attach">
                        <div id="file_preview"></div>
                        </div>
                    </form>
                    <div class="form-actions">
                        <button type="reset patient-schedule-reset-btn" class="btn default">Reset</button>
                        <button type="button" class="btn red patient-schedule-btn">Add New Schedule</button>
                    </div>

            </div>
        </div>
    </div>
</div>

<script src="<?=base_url()?>assets/myjs/addNewSchedule.js" type="text/javascript"></script>

