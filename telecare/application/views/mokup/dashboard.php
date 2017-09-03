<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 9:16 AM
 */?>
<html>
<head>
    <title>Moke Up | Dashboard</title>
    <?php $this->load->view('mokup/layout/common')?>
    <script src="https://static.opentok.com/v2/js/opentok.js"></script>
    <script src="<?=base_url()?>assets/global/plugins/ckeditor/ckeditor.js"></script>


</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Header
</div>


<div class="row mokup-border" style="height: 120%; margin: 50px 10%;text-align: center;">
    <div class="col-md-12" style="height: 100%;padding: 0;">
        <div class="row" style="height: 20%;">
            <div class="col-md-9" style="height:100%;">
                <div class="mokup-border" style=" margin: 5%;">

                    <div style="">
                        Welcome Dr. <?=$this->session->userdata("fname")." ".$this->session->userdata('lname')?> <br>
                        Email : <?=$this->session->userdata("email")?><br>
                        Address : <?=$this->session->userdata("addr")?><br>
                        State : <?=$this->session->userdata("state")?><br>
                        Phone : <?=$this->session->userdata("phone")?><br>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="text-align: right">
                <img src="<?=base_url()?>assets/uploads/doctor/<?=$this->session->userdata("img")?>" style="height: 100%;" class="mokup-border">
            </div>

        </div>
        <div class="row" style="height: 80%; margin: 0;">
            <div class="col-md-3 mokup-border" style="height: 100%;padding: 0;text-align: center; position: relative;">
                <div class="mokup-border" style="width: 80%; margin: 5%">Dashboard</div>
                <div class="mokup-border" style="width: 80%; margin: 5%" id="waitingroom">Waiting Room<br>

                </div>
                <div class="mokup-border" style="width: 80%;margin: 5%;">
                    <a href="#my_active_patient_table" class="" style="width: 100%;">My Active Patient</a>
                </div>
                <div class="mokup-border" style="width: 80%;margin: 5%;">
                    <a href="#new_patient_list" class="" style="width: 80%;">New Patient</a>
                </div>
                <div class="mokup-border" style="width: 80%; margin: 5%">
                    <a href="#eopat_patient">eOPAT Patient</a>
                </div>
                <div class="mokup-border" style="width: 80%; margin: 5%">
                    <a href="#discharged_patient">Discharged Patient</a>
                </div>
                <div class="mokup-border" style="width: 80%; margin: 5%">
                    <a href="#prior_consults">Prior Consults</a>
                </div>
                <div class="mokup-border" style="width: 80%; margin: 5%">
                    <a href="#calendar">Schedule Availability</a>
                </div>
                <button class="btn btn-default logout-btn">Logout</button>

                <a href="<?=base_url()?>accounts_page" class="mokup-border" style="width: 80%;  position: absolute; bottom: 5%;left: 5%">Account Setting</a>
            </div>
            <div class="col-md-9 mokup-border" style="height: 100%; position: relative;padding: 0;">
                <div style="height: 5%; width: 90%;margin: 0 5%;"><h3>Upcoming Appointment</h3></div>
                <div class="mokup-border" style="width: 90%; height: 40%; margin: 0% 5%;overflow-y: scroll;">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Thumb</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody id="upcoming_appointment">

                        </tbody>
                    </table>
                </div>

                <div class="" style="width: 90%; height: 20%; margin: 5% 5%;">
                    <textarea cols="100" id="editor1" name="editor1" style="height: calc(100% - 200px;);"></textarea>
                    <div style="text-align: left">
                        <select multiple id="receiver-patients" style="width: 30%;height: 30%;" class="mokup-border">
                        </select>
                        <button class="btn btn-default send-msg-btn" style="margin-top: -35px;">Send</button>
                    </div>
                </div>


            </div>
        </div>

    </div>


</div>

<div class="row" style="margin: 0 10% 50px 10%;text-align: center;">
    <h1>My Active Patient</h1>
</div>

<div id="my_active_patient_table" class="row mokup-border" style="margin: 0 10% 50px 10%;text-align: center;">
    <table class="table table-hover">
        <thead id="my_active_patient">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody id="">

        </tbody>
    </table>
</div>

<div class="row" style="margin: 0 10% 50px 10%;text-align: center;">
    <h1>New Patient List</h1>
</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    <table class="table table-hover" id="new_patient_list">
        <thead >
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody id="new_patients">

        </tbody>
    </table>
</div>

<div class="row" style="margin: 0 10% 50px 10%;text-align: center;">
    <h1>eOPAT Patient</h1>
</div>
<div class="row mokup-border" style="margin: 0 10% 50px 10%;text-align: center;">
    <table class="table table-hover">
        <thead >
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody id="eopat_patient">

        </tbody>
    </table>
</div>

<div class="row" style="margin: 0 10% 50px 10%;text-align: center;">
    <h1>Discharged Patient</h1>
</div>
<div class="row mokup-border" style="margin: 0 10% 50px 10%;text-align: center;">
    <table class="table table-hover">
        <thead >
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody id="discharged_patient">

        </tbody>
    </table>
</div>

<div class="row" style="margin: 0 10% 50px 10%;text-align: center;">
    <h1>Prior Consults</h1>
</div>
<div class="row mokup-border" style="margin: 0 10% 50px 10%;text-align: center;">
    <table class="table table-hover">
        <thead >
        <tr>
            <th>Date</th>
            <th>Duration</th>
            <th>Attachment</th>
        </tr>
        </thead>
        <tbody id="prior_consults">

        </tbody>
    </table>
</div>

<div class="row mokup-border" style="width:80%;margin: 5% 10%; text-align: center;padding: 5% 5%;" id="calendar-part">
    <div id='calendar'></div>
</div>

<div id="event-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Schedule Details</h4>
            </div>
            <div class="modal-body" id="event-modal-boday" style="font-size: 20px;">

                <span> Patient Name : </span> <span id="event_patient_name"></span><br>
                <span> Patient Email : </span> <span id="event_patient_email"></span><br>
                <span> Patient Phone : </span> <span id="event_patient_phone"></span><br>
                <span> Patient Address : </span> <span id="event_patient_addr"></span><br>
                <span> Date : </span> <span id="event_schedule_date"></span><br>
                <span> Note : </span> <span id="event_schedule_note"></span><br>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    var waitingroom = $("#waitingroom");
    var my_active_patient = $("#my_active_patient");
    var new_patients = $("#new_patients");
    var upcoming_appoints = $('#upcoming_appointment');

    var msgHistory = $("#chat-history");
    var my_id = "<?=$this->session->userdata('doctor_id')?>";
    var my_type  = "doctor";
    var my_token = "<?=$this->session->userdata('token')?>";
    var msgTxt = $("#chat-message-input");
    var receiver_patients = $("#receiver-patients");
    var chat_msg_count = 0;
    var event_modal = $("#event-modal");
    $.ajax({
        url : baseURL+"get_today_schedule",
        data : {token : my_token},
        dataType : "json",
        type : 'post',
        success : function (data) {

            if(data.success == 1) {
                var today_schedules = data.data;
                for(var i=0;i<today_schedules.length;i++)
                {
                    waitingroom.append("<div class='waitingroom-item' style='cursor: pointer;padding:5px;background-color: #ddd;width: 100%;'><a href='"+baseURL+"video_call_doctor/"+today_schedules[i]['pid']+"'>"+today_schedules[i]['fname']+" "+today_schedules[i]['lname']+"</div>");
                }
            }
            else{

            }
        },
        fail : function (err) {
        }
    });

    $.ajax({
        url : baseURL+"upcoming_appointment",
        data : {token : my_token},
        type : 'post',
        dataType : 'json',
        success : function (data) {
            //alert(data);
            var upcoming_schedules = data.data;
            for(var i=0;i<upcoming_schedules.length;i++)
            {
                upcoming_appoints.append("\
                        <tr>\
                            <td><img src='"+upcoming_schedules[i]['patient']['img']+"' style='width: 100px;'></td>\
                            <td>"+upcoming_schedules[i]['patient']['fname']+" "+upcoming_schedules[i]['patient']['lname']+"</td>\
                            <td>"+upcoming_schedules[i]['patient']['email']+"</td>\
                            <td>"+upcoming_schedules[i]['schedule']['date']+"</td>\
                        </tr>\
                    ");
            }
        }
    });

    $.ajax({
        url : baseURL+"get_my_patients",
        data : {token : "<?=$this->session->userdata('token')?>"},
        dataType : "json",
        type : 'post',
        success : function (data) {
            if(data.success == 1)
            {
                var my_active_patients = data.data;
                for(var i=0;i<my_active_patients.length;i++)
                {
                    my_active_patient.append("\
                        <tr>\
                            <td>"+my_active_patients[i]['fname']+"</td>\
                            <td>"+my_active_patients[i]['lname']+"</td>\
                            <td>"+my_active_patients[i]['email']+"</td>\
                        </tr>\
                    ");

                    receiver_patients.append("\
                        <option value='"+my_active_patients[i]['pid']+"'>"+my_active_patients[i]["fname"]+" "+my_active_patients[i]["lname"]+"</option>\
                    ");

                }
            }
            else{

            }
        },
        fail : function (err) {
            alert(err);
        }
    });

    $.ajax({
        url : baseURL+"get_new_patients",
        data : {token : "<?=$this->session->userdata('token')?>"},
        dataType : "json",
        type : 'post',
        success : function (data) {
            if(data.success == 1)
            {
                var new_patients_list = data.data;
                for(var i=0;i<new_patients_list.length;i++)
                {
                    new_patients.append("\
                        <tr>\
                            <td>"+new_patients_list[i]['fname']+"</td>\
                            <td>"+new_patients_list[i]['lname']+"</td>\
                            <td>"+new_patients_list[i]['email']+"</td>\
                        </tr>\
                    ");
                }
            }
            else{

            }
        },
        fail : function (err) {
            alert(err);
        }
    });

    function getPriorConsults(email) {
        $.ajax({
            url : baseURL+"get_prior_consults",
            type : 'post',
            dataType : 'json',
            data : {token : my_token, email : email},
            success : function (data) {

            },
            fail : function (err) {
                alert(err)
            }
        })
    }



    $(".logout-btn").click(function () {
        $.ajax({
            url : baseURL+"logout_doctor",
            type : "post",
            data : {token: my_token}
        });
        location.href = baseURL+"login";
    });

    // Replace the <textarea id="editor1"> with an CKEditor instance.
    CKEDITOR.replace( 'editor1', {
        on: {


        }
    });

    $(".send-msg-btn").click(function () {
        var editor = CKEDITOR.instances.editor1;

        // Get editor contents
        // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
        //alert( editor.getData() );
        var receiver_patients_ids = receiver_patients.val();
        var msg = editor.getData();
        if(receiver_patients_ids == null)
        {
            alert("Please Select Receiver Patients");
            return;
        }
        if(msg == "")
        {
            alert("Please Input Message to send");
            return;
        }

        $.ajax({
            url : baseURL+"send_message",
            type : "post",
            dataType : "json",
            data : {token : my_token, receivers : receiver_patients_ids,msg : msg},
            success : function (data)
            {
                if(data.success == 1)
                {
                    alert("Message send success");
                }
                else{
                    alert("Message send error!");
                }
            }
        });

    });

    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        //defaultDate: '2014-09-12',
        selectable: true,
        selectHelper: true,
        select: function(start, end) {
//            var title = prompt('Event Title:');
//            var eventData;
//            if (title) {
//                eventData = {
//                    title: title,
//                    start: start,
//                    end: end
//                };
//                $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
//            }
//            $('#calendar').fullCalendar('unselect');


        },
        visibleRange : {
            start : new Date()
        },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: {
            url: baseURL+"getschedules_doctor",
            type : 'post',
            data : {token : my_token},
            error: function() {
                alert("getting schedules error");
            }
        },
        loading: function(bool) {
            $('#loading').toggle(bool);
        },
        eventClick : function (calEvent,jsEvent, view) {
//            alert(calEvent);

            $("#event_patient_name").html(calEvent.patient.fname+" "+calEvent.patient.lname);
            $("#event_patient_email").html(calEvent.patient.email);
            $("#event_patient_phone").html(calEvent.patient.phone);
            $("#event_patient_addr").html(calEvent.patient.addr);
            $("#event_schedule_date").html(calEvent.schedule.date);
            $("#event_schedule_note").html(calEvent.schedule.note);
            event_modal.modal('show');

        }

    });



</script>

</body>
