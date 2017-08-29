<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 9:18 AM
 */?>
<html>
<head>
    <title>Moke Up | Dashboard</title>
    <?php $this->load->view('mokup/layout/common')?>
    <script src="https://static.opentok.com/v2/js/opentok.js"></script>
    <script src="<?=base_url()?>assets/global/plugins/dropzone/dropzone.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/global/plugins/dropzone/css/dropzone.css">
</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Header
</div>

<div class="row mokup-border" style="height: 70%; margin: 50px 10%;text-align: center;">
    <div class="col-md-10" style="height: 100%;padding: 0;">
        <div class="row" style="height: 25%;">
            <div class="col-md-3" style="height:100%;">
                <div class="mokup-border" style=" margin: 5%;">
                    <img src="<?=base_url()?>assets/uploads/patient/<?=$this->session->userdata("img")?>" style="width: 30%;float: left;"><br>
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
        <div class="row" style="height: 75%; margin: 0;">
            <div class="col-md-3 mokup-border" style="height: 100%;padding: 0;text-align: center;position: relative;">
                <div class="mokup-border" style="width: 80%; margin: 5%">Dashboard</div>
                <div class="mokup-border" style="width: 80%; margin: 5%;text-align: center;">Waiting Room<br>
                    <?php if($waitingroom):?>
                        <div class="waitingroom-item" style="cursor: pointer;padding:5px;background-color: #ddd;width: 100%;"><?=$doctor['fname']?> <?=$doctor['lname']?> <?=$waitingroom["id"]?></div>
                    <?php endif;?>
                </div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Upload</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Schedule appointment</div>

                <a  href="<?=base_url()?>accounts_page" class="mokup-border" style="width: 80%; left: 5%; position: absolute; bottom: 5%;">Account Setting</a>
            </div>
            <div class="col-md-9" style="height: 100%;">
                <div class="row " style="height: 100%;position: relative;">
<!--                    <img class="mokup-no-imag" src="--><?//=base_url()?><!--assets/mokup/noimage.png" style="">-->
                    <div id="publisher" style="width: 30%;height: 30%;position: absolute;bottom: 0;z-index: 1000;" class="mokup-border"></div>
                    <div id="subscriber" style="width: 100%;height: 100%;position: absolute;" class="mokup-border"></div>
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-2" style="height: 100%;padding: 0">
        <div class="" style="height: 25%; padding: 0;position: relative;">
            <?php if($doctor):?>
                <img class="mokup-no-imag" src="<?=base_url()?>assets/uploads/doctor/<?=$doctor['img']?>" style="">
            <?php else:?>
                <img src="<?=base_url()?>assets/mokup/noimage.png" style="width: 100%;height: 100%;" class="mokup-border">
            <?php endif;?>
            <span style="position: absolute;top: 50%;left: 20%" class="mokup-border">ID Doctor</span>
        </div>
        <div style="height: 75%; padding: 0; position: relative;" class="mokup-border">
            <div style="height: calc(100% - 50px);width: 100%;overflow-y: scroll;padding: 15px;" class="mokup-border" id="chat-history">

            </div>

            <input type="text" class="mokup-border" style="width: 100%;position: absolute;bottom: 0;left: 0;height: 50px;" placeholder="Messaging" id="chat-message-input">

        </div>
    </div>
</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Your Document
</div>

<div class="row mokup-border" style="width:60%; margin: 5% 20%; text-align: center;">

    <form action="<?=base_url()?>upload_patient_files" class="dropzone" id="my-dropzone">
        <input type="hidden" name="token" value="<?=$this->session->userdata('token')?>">

    </form>

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">

</div>

<div class="row mokup-border" style="width:60%;height: 30%; margin: 5% 20%; text-align: center;padding: 10%;">
    <span class="mokup-border" style="padding: 40px 1%;">Calendar</span>
</div>


<script>

    var my_id = "<?=$this->session->userdata('patient_id')?>";
    var my_type  = "patient";
    var my_token = "<?=$this->session->userdata('token')?>";
    var msgTxt = $("#chat-message-input");
    var chat_msg_count = 0;

    $(".waitingroom-item").click(function () {
        var post_data = {
            token : my_token
        }
        $.ajax({
            url : baseURL+'req_call',
            data : post_data,
            type : 'post',
            dataType : "json",
            success : function (data) {

                if(data.success == 1)
                {
                    opentokInit(data.data.opentok_session_id,data.data.opentok_token);
                }
                else{
                    alert(data.error);
                }
            },
            fail : function (err) {
                alert(err);
            }
        });
    });

    function opentokInit(ot_session_id,ot_token ) {

        var apiKey = "45947752",
            session,
            sessionId = '1_MX40NTk0Nzc1Mn5-MTUwNDAzMDQ1NTY3Nn5RODJiM0hxcmNudTBScklWSEhtS0JSeW1-UH4';//ot_session_id,
            token  = "T1==cGFydG5lcl9pZD00NTk0Nzc1MiZzaWc9N2Y1ZDc5NWJkZjFmNzIwNGJmNGFlZGI1ZjM0ZWE5OWRhYTYwOTExMzpzZXNzaW9uX2lkPTFfTVg0ME5UazBOemMxTW41LU1UVXdOREF6TURRMU5UWTNObjVST0RKaU0waHhjbU51ZFRCU2NrbFdTRWh0UzBKU2VXMS1VSDQmY3JlYXRlX3RpbWU9MTUwNDAzMDQ1NSZyb2xlPXB1Ymxpc2hlciZub25jZT0xNTA0MDMwNDU1Ljc4MTk2NTIwOQ==";//ot_token,
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
            var msgHistory = $("#chat-history");
            session.on('signal:msg', function(event) {
//                var msg = document.createElement('p');
//                msg.textContent = event.data;
//                msg.className = event.from.connectionId === session.connection.connectionId ? 'mine' : 'theirs';
//                msgHistory.appendChild(msg);
//                msg.scrollIntoView();
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

        // Text chat



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


    var FormDropzone = function () {

        return {
            //main function to initiate the module
            init: function () {

                Dropzone.options.myDropzone = {
                    init: function() {
                        this.on("addedfile", function(file) {
                        });

                        this.on("success", function(file,response, event) {

                            var response = JSON.parse(response);

                            if(response.success == 1) {
                                var removeButton = Dropzone.createElement("<button class='btn btn-sm btn-block'>Remove file</button>");

                                // Capture the Dropzone instance as closure.
                                var _this = this;

                                // Listen to the click event
                                removeButton.addEventListener("click", function (e) {
                                    // Make sure the button click doesn't submit the form:
                                    e.preventDefault();
                                    e.stopPropagation();

                                    // Remove the file preview.
                                    _this.removeFile(file);
                                    // If you want to the delete the file on the server as well,
                                    // you can do the AJAX request here.
                                });
                                file.previewElement.appendChild(removeButton);
                            }
                            else if(response.success == 0){
                                var removeButton = Dropzone.createElement("<div class='btn btn-sm btn-block'>Upload Faild</div>");
                                file.previewElement.appendChild(removeButton);
                            }
                        });
                    }
                }
            }
        };
    }();

    FormDropzone.init();

</script>


</body>

