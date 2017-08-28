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
</head>

<body>

<?php
var_dump($this->session);

?>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Header
</div>

<div class="row mokup-border" style="height: 70%; margin: 50px 10%;text-align: center;">
    <div class="col-md-10" style="height: 100%;padding: 0;">
        <div class="row" style="height: 35%;">
            <div class="col-md-3" style="height:100%;">
                <div class="mokup-border" style=" margin: 5%;">
                    <img src="<?=base_url()?>assets/uploads/patient/<?=$this->session->userdata("img")?>" style="width: 50%;float: left;">
                    <div style=";">
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
        <div class="row" style="height: 65%; margin: 0;">
            <div class="col-md-3 mokup-border" style="height: 100%;padding: 0;text-align: center">
                <div class="mokup-border" style="width: 80%; margin: 5%">Dashboard</div>
                <div class="mokup-border" style="width: 80%; margin: 5%;text-align: center;">Waiting Room<br>
                    <?php if($waitingroom):?>
                        <div class="waitingroom-item" style="cursor: pointer;padding:5px;background-color: #ddd;width: 100%;"><?=$doctor['fname']?> <?=$doctor['lname']?> <?=$waitingroom["id"]?></div>
                    <?php endif;?>
                </div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Upload</div>
                <div class="mokup-border" style="width: 80%; margin: 5%">Schedule appointment</div>

                <div class="mokup-border" style="width: 80%; margin: 5%; position: absolute; bottom: 5%;">Account Setting</div>
            </div>
            <div class="col-md-9" style="height: 100%;">
                <div class="row " style="height: 100%; padding:5%;">
<!--                    <img class="mokup-no-imag" src="--><?//=base_url()?><!--assets/mokup/noimage.png" style="">-->
                    <div id="publisher" style="width: 50%;height: 100%;" class="mokup-border"></div>
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-2" style="height: 100%;padding: 0">
        <div class="" style="height: 20%; padding: 0;position: relative;">
            <?php if($doctor):?>
                <img class="mokup-no-imag" src="<?=base_url()?>assets/uploads/doctor/<?=$doctor['img']?>" style="">
            <?php else:?>
                <img src="<?=base_url()?>assets/mokup/noimage.png" style="width: 100%;height: 100%;" class="mokup-border">
            <?php endif;?>
            <span style="position: absolute;top: 50%;left: 20%" class="mokup-border">ID Doctor</span>
        </div>
        <div style="height: 75%; padding: 0; margin-top: 10%; position: relative;" class="mokup-border">
            Chat

            <input type="text" class="mokup-border" style="width: 100%;position: absolute;bottom: 0;left: 0;height: 50px;" placeholder="Messaging" id="chat-message-input">

        </div>
    </div>
</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Your Document
</div>

<div class="row mokup-border" style="width:60%;height: 30%; margin: 5% 20%; text-align: center;">
    Upload documents drag and drop
</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">

</div>

<div class="row mokup-border" style="width:60%;height: 30%; margin: 5% 20%; text-align: center;padding: 10%;">
    <span class="mokup-border" style="padding: 40px 1%;">Calendar</span>
</div>


<script>

    $(".waitingroom-item").click(function () {
        var post_data = {
            token : "<?=$this->session->userdata('token')?>",
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
            var msgHistory = document.querySelector('#history');
            session.on('signal:msg', function(event) {
                var msg = document.createElement('p');
                msg.textContent = event.data;
                msg.className = event.from.connectionId === session.connection.connectionId ? 'mine' : 'theirs';
                msgHistory.appendChild(msg);
                msg.scrollIntoView();
            });
        }

        // Text chat

        var msgTxt = $("#chat-message-input");

        msgTxt.keypress(function (e) {
            var key = e.which;
            if(key == 13)
            {
                session.signal({
                    type: 'msg',
                    data: msgTxt.value
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

