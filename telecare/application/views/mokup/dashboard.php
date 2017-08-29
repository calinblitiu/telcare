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

</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Header
</div>


<div class="row mokup-border" style="height: 100%; margin: 50px 10%;text-align: center;">
    <div class="col-md-10" style="height: 100%;padding: 0;">
        <div class="row" style="height: 20%;">
            <div class="col-md-3" style="height:100%;">
                <div class="mokup-border" style=" margin: 5%;">
                    <img src="<?=base_url()?>assets/uploads/doctor/<?=$this->session->userdata("img")?>" style="width: 30%;float: left;"><br>
                    <div style="">
                        Welcome <?=$this->session->userdata("fname")." ".$this->session->userdata('lname')?> <br>
                        Email : <?=$this->session->userdata("email")?><br>
                        SSN : <?=$this->session->userdata("ssn")?><br>
                        Address : <?=$this->session->userdata("addr")?><br>
                    </div>
                </div>
            </div>
            <div class="col-md-9" style="height: 100%">
                <span class="mokup-border" style="margin:30%;">Session Code</span>
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
                <div class="mokup-border" style="width: 80%; margin: 5%">eOPAT Patient</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Discharged Patient</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Prior Consults</div>
                <a href="<?=base_url()?>accounts_page" class="mokup-border" style="width: 80%;  position: absolute; bottom: 5%;left: 5%">Account Setting</a>
            </div>
            <div class="col-md-9" style="height: 100%; position: relative;padding: 0;">
                <div id="publisher" style="width: 30%;height: 30%;position: absolute;bottom: 0; z-index: 1000;" class="mokup-border"></div>
                <div id="subscriber" style="width: 100%;height: 100%;position: absolute;" class="mokup-border"></div>
            </div>
        </div>

    </div>

    <div class="col-md-2" style="height: 100%;padding: 0">
<!--        <div class="" style="height: 20%; padding: 0;position: relative;">-->
<!--            <img class="mokup-no-imag" src="--><?//=base_url()?><!--assets/mokup/noimage.png" style="">-->
<!--            <span style="position: absolute;top: 50%;left: 20%" class="mokup-border">ID Doctor</span>-->
<!--        </div>-->
        <div style="height: 20%; padding: 0; " class="mokup-border">
            Calender
        </div>
        <div style="height: 80%; padding: 0;  position: relative;" class="mokup-border">
            <div style="height: calc(100% - 50px);width: 100%;overflow-y: scroll;padding: 15px;" class="mokup-border" id="chat-history">

            </div>

            <input type="text" class="mokup-border" style="width: 100%;position: absolute;bottom: 0;left: 0;height: 50px;" placeholder="Messaging" id="chat-message-input">

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

<div class="row mokup-border" style="height: 30%; margin: 0 10% 50px 10%;text-align: center;">
    Table Format<br><br>
    Date Duration Attachment
</div>

<script>
    var waitingroom = $("#waitingroom");
    var my_active_patient = $("#my_active_patient");
    var new_patients = $("#new_patients");

    var msgHistory = $("#chat-history");
    var my_id = "<?=$this->session->userdata('doctor_id')?>";
    var my_type  = "doctor";
    var my_token = "<?=$this->session->userdata('token')?>";
    var msgTxt = $("#chat-message-input");

    var chat_msg_count = 0;
    $.ajax({
        url : baseURL+"get_today_schedule",
        data : {token : "<?=$this->session->userdata('token')?>"},
        dataType : "json",
        type : 'post',
        success : function (data) {

            if(data.success == 1) {
                var today_schedules = data.data;
                for(var i=0;i<today_schedules.length;i++)
                {
                    waitingroom.append("<div class='waitingroom-item' data-email='"+today_schedules[i]['email']+"' style='cursor: pointer;padding:5px;background-color: #ddd;width: 100%;'>"+today_schedules[i]['fname']+" "+today_schedules[i]['lname']+"</div>");
                }
            }
            else{

            }
        },
        fail : function (err) {
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

    $(document).on("click",".waitingroom-item",function () {
        var email = $(this).data('email');
        $.ajax({
            url : baseURL+'req_call_doctor',
            type: 'post',
            data:{token : "<?=$this->session->userdata('token')?>",email : email},
            dataType : "json",
            success : function (data)
            {
                if(data.success ==  1)
                {
                    opentokInit(data.data.opentok_session_id,data.data.opentok_token);
                }
                else{
                    alert(data.error);
                }
            },
            fail : function(err)
            {

            }
        });
    });


    function opentokInit(ot_session_id,ot_token ) {

        var apiKey = "45947752",
            session,
            sessionId = ot_session_id,
            token  = ot_token,
            response;
        initializeSession();
        function initializeSession() {
            session = OT.initSession(apiKey, sessionId);

            // Subscribe to a newly created stream
            session.on('streamCreated', function(event) {
                var subscriberOptions = {
                    insertMode: 'append',
                    width: '100%',
                    height: '100%'
                };
                session.subscribe(event.stream, 'subscriber', subscriberOptions, function(error) {
                    if (error) {
                        console.log('There was an error publishing: ', error.name, error.message);
                    }
                });
            });

            session.on('sessionDisconnected', function(event) {
                console.log('You were disconnected from the session.', event.reason);
            });

            // Connect to the session
            session.connect(token, function(error) {
                // If the connection is successful, initialize a publisher and publish to the session
                if (!error) {
                    var publisherOptions = {
                        insertMode: 'append',
                        width: '100%',
                        height: '100%'
                    };
                    var publisher = OT.initPublisher('publisher', publisherOptions, function(error) {
                        if (error) {
                            console.log('There was an error initializing the publisher: ', error.name, error.message);
                            return;
                        }
                        session.publish(publisher, function(error) {
                            if (error) {
                                console.log('There was an error publishing: ', error.name, error.message);
                            }
                        });
                    });
                } else {
                    console.log('There was an error connecting to the session: ', error.name, error.message);
                }
            });

            // Receive a message and append it to the history

            session.on('signal:msg', function(event) {

                var append_msg = "";
                if(event.data.sender == my_id && event.data.sender_type == my_type){
                    append_msg = "<p style='text-align: right;'>\
                        "+event.data.msg+"\
                        </p>";
                }
                else{
                    append_msg = "<p style='text-align: left;'>\
                        "+event.data.msg+"\
                        </p>";
                }
                msgHistory.append(append_msg);
                chat_msg_count++;
                msgHistory.animate({scrollTop:chat_msg_count*50 },1000);
                msgTxt.val("");

            });
        }

        msgTxt.keypress(function (ev) {
            var key = ev.which;
            if(key == 13)
            {
                session.signal({
                    type: 'msg',
                    data: {msg : msgTxt.val(),sender : my_id,sender_type : my_type}
                }, function(error) {
                    if (error) {
                        console.log('Error sending signal:', error.name, error.message);
                    } else {
                        msgTxt.value = '';
                    }
                });
            }
        });

    }
</script>

</body>
