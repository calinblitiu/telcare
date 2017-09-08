<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 9/1/2017
 * Time: 2:36 PM
 */?>
<?php $this->load->view('mokup/layout/common');?>
<script src="https://static.opentok.com/v2/js/opentok.js"></script>

<button href="<?=base_url()?>patient_dashboard" class="close" style="position: absolute;top:0px;left: 40px; color: #53c397;font-size: 50px;font-weight: 100;opacity: 1;z-index: 100;" id="close-btn">&times;</button>
<div style="position: fixed;top: 10px;left: 40%;z-index: 10000; background-color: #000000;padding: 10px 30px;border-radius: 5px;opacity: 0.5;">
    <span style="font-size: 30px;color: #28ffaa;cursor: pointer;" id="toggle_video"><i class="glyphicon glyphicon-facetime-video"></i></span>
    <span style="font-size: 30px;color: #28ffaa;cursor: pointer;margin-left: 30px;" id="toggle_mic"><i class="glyphicon glyphicon-ice-lolly"></i></span>
    <span style="font-size: 30px;color: #28ffaa;cursor: pointer;margin-left: 30px;" id="toggle_audio"><i class="glyphicon glyphicon-headphones"></i></span>
    <span style="font-size: 30px;color: #ff1237;cursor: pointer;margin-left: 30px;" id="toggle_record"><i class="glyphicon glyphicon-record"></i></span>

    <span style="color: white;font-size: 30px; margin-left: 20px;" id="timer">00:00:00</span>
</div>
<div class="row" style="height: 100%;margin: 0;padding: 0;">
    <div class="col-md-10 mokup-border" style="height: 100%;padding: 0;margin: 0;">
        <div id="subscriber" style="height: 100%;width: 100%" class="mokup-border">

        </div>
    </div>
    <div class="col-md-2 mokup-border" style="height: 100%;padding: 0;margin: 0;">
        <div id="publisher" style="width: 100%" class="mokup-border">

        </div>
        <div id="added_person" style="width: 100%" class="mokup-border">

        </div>
        <div id="chat_box" style="width: 100%;position: relative;" class="mokup-border">
            <div id="message_contents" style="overflow-y: scroll;height: calc(100% - 50px);padding: 5px;">

            </div>
            <input type="text" class="mokup-border" style="height: 50px;width: 100%;position: absolute;bottom: 0;left: 0;" id="msg-input">
        </div>

    </div>
</div>

<script>
    var publisher_div = $("#publisher");
    var added_person = $("#added_person");
    var chat_box = $("#chat_box");
    var msg_input = $("#msg-input");
    var message_contents = $("#message_contents");
    var patient_email = "<?=$patient_email?>"
    var my_id = "<?=$this->session->userdata('doctor_id')?>";
    var my_type  = "doctor";
    var my_token = "<?=$this->session->userdata('token')?>";
    var chat_msg_count = 0;
    var connected_count = 0;
    var is_video = true;
    var is_mic = true;
    var is_audio = true;
    var toggle_video = $("#toggle_video");
    var toggle_mic = $("#toggle_mic");
    var toggle_audio = $("#toggle_audio");
    var herok_url = "https://recvideo.herokuapp.com/";
    var is_recording = false;
    var timer = $("#timer");
    var timer_interval = null;
    var chat_time = 0;
    var close_btn = $("#close-btn");
    var my_img = "<?php if($this->session->userdata['img'] == ''){echo base_url().'assets/uploads/doctor/no-img.png';}else{echo base_url().'assets/uploads/doctor/'.$this->session->userdata['img'];}?>";

    publisher_width = publisher_div.width();
    publisher_div.height(publisher_width);

    added_person_width = added_person.width();

    if(connected_count == 2)
    {
        added_person.height(added_person_width);
        chat_box.height($(window).height()-publisher_width-added_person_width-8);
    }
    else {
        added_person.height(0);
        chat_box.height($(window).height()-publisher_width-8);
    }

    $(window).on('resize',function () {
        publisher_width = publisher_div.width();
        publisher_div.height(publisher_width);
        added_person_width = added_person.width();
        if(connected_count == 2) {
            added_person.height(added_person_width);
            chat_box.height($(window).height() - publisher_width - added_person_width - 8);
        }
        else{
            added_person.height(0);
            chat_box.height($(window).height()-publisher_width-8);
        }
    });


        $.ajax({
            url : baseURL+"req_call_doctor",//herok_url+'room/test',
            type: 'post',
            data:{token : my_token,email : patient_email,is_call : 0},
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
//                opentokInit(data.sessionId, data.token);
            },
            fail : function(err)
            {

            }
        });

//    $.ajax({
//        url : herok_url+'room/test',
//        type: 'get',
//        //data:{token : my_token,email : patient_email,is_call : 0},
//        dataType : "json",
//        success : function (data)
//        {
//            opentokInit(data.sessionId, data.token);
//        },
//        fail : function(err)
//        {
//
//        }
//    });

    toggle_video.click(function () {
        is_video = !is_video;
        publisher.publishVideo(is_video);
        if(is_video)
        {
            toggle_video.css("color","#28ffaa" );
        }
        else{
            toggle_video.css("color","#ff1237" );
        }
    });
    var apiKey = "45947752",
        session,
        sessionId ,
        token  ,
        response,
        archiveID,
         publisher,
        subscriber,
        other_person;
    function opentokInit(ot_session_id,ot_token ) {

        sessionId = ot_session_id;
        token  = ot_token;

        initializeSession();
        function initializeSession() {
            session = OT.initSession(apiKey, sessionId);

            // Subscribe to a newly created stream
            session.on('streamCreated', function(event) {
                connected_count ++;
                var subscriberOptions = {
                    insertMode: 'append',
                    width: '100%',
                    height: '100%',
                    style : {buttonDisplayMode: 'off'}
                };
                if(connected_count == 1) {

                    added_person.height(0);
                    chat_box.height($(window).height()-publisher_width-8);

                    subscriber = session.subscribe(event.stream, 'subscriber', subscriberOptions, function (error) {
                        if (error) {
                            console.log('There was an error publishing: ', error.name, error.message);
                        }
                    });

                    timer_interval = setInterval(timerInterval,1000);
                }
                if(connected_count == 2)
                {
                    publisher_width = publisher_div.width();
                    added_person_width = added_person.width();
                    added_person.height(added_person_width);
                    chat_box.height($(window).height() - publisher_width - added_person_width - 8);

                    other_person = session.subscribe(event.stream, 'added_person', subscriberOptions, function (error) {
                        if (error) {
                            console.log('There was an error publishing: ', error.name, error.message);
                        }
                    });
                }
            });

            session.on('sessionDisconnected', function(event) {
                connected_count--;
                console.log('You were disconnected from the session.', event.reason);
                added_person.height(0);
                chat_box.height($(window).height()-publisher_width-8);
                clearInterval(timer_interval);

            });

            session.on('archiveStarted',function (event) {
                archiveID = event.id;
                toggle_record.css("color","#28ffaa" );
            });

            session.on('archiveStopped',function (event) {
                archiveID = event.id
                $.ajax({
                   url : baseURL+"savearchiveid",
                    type : "post",
                    dataType : 'json',
                    data :{token : my_token, archiveId : archiveID, email : patient_email},
                    success : function (data) {
                        if(data.success == 1)
                        {
                            alert('Video is saved successfully');
                        }
                        else{
                            alert(data.error);
                        }
                    }
                });
//                window.location = herok_url+"archive/"+archiveID+"/view";
               //archiveID = null;
               toggle_record.css("color","#ff1237" );

            });

            session.on("streamDestroyed",function () {
                connected_count--;
                added_person.height(0);
                chat_box.height($(window).height()-publisher_width-8);
                clearInterval(timer_interval);

            });

            // Connect to the session
            session.connect(token, function(error) {
                // If the connection is successful, initialize a publisher and publish to the session
                if (!error) {
                    var publisherOptions = {
                        insertMode: 'append',
                        width: '100%',
                        height: '100%',
                        style : {buttonDisplayMode: 'off'}
                    };
                     publisher = OT.initPublisher('publisher', publisherOptions, function(error) {
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
                    append_msg = "\
                    <img src='"+event.data.sender_img+"' style='width: 30px;height:30px;border-radius: 15px;border: solid 1px #31a37c;;float: right;'><br><br>\
                    <p style='text-align: right;padding: 5px;background-color: #ccc;border-radius: 5px;color: white;word-wrap: break-word;'>\
                        "+event.data.msg+"\
                        </p>";
                    msg_input.val("");
                }
                else{
                    append_msg = "\
                    <img src='"+event.data.sender_img+"' style='width: 30px;height:30px;border-radius: 15px;border: solid 1px #31a37c;margin-bottom: 5px;'>\
                    <p style='text-align: left;padding: 5px;background-color: #58a8fc;color: white;border-radius: 5px;word-wrap: break-word;'>\
                        "+event.data.msg+"\
                        </p>";
                }
                message_contents.append(append_msg);
                chat_msg_count++;
                message_contents.animate({scrollTop:chat_msg_count*1000 },1000);

            });
        }

        msg_input.keypress(function (ev) {
            var key = ev.which;
            if(key == 13)
            {
                if(msg_input.val()=="")
                {
                    return;
                }
                if(msg_input.val().length>=8192)
                {
                    alert("you can not send message longer than 8192 charactors");
                    return;
                }
                session.signal({
                    type: 'msg',
                    data: {msg : msg_input.val(),sender : my_id,sender_type : my_type, sender_img: my_img}
                }, function(error) {
                    if (error) {
                        console.log('Error sending signal:', error.name, error.message);
                    } else {
                        msg_input.val("");
                    }
                });
                msg_input.val("");
            }
        });

    }


    var toggle_record = $("#toggle_record").click(function () {
        if(!is_recording) {

            startArchive();
        }
        else{

            stopArchive();
        }
        is_recording = !is_recording;
    });

    function timerInterval() {
        chat_time ++;
        var hours = Math.floor(chat_time/3600);
        var mins = Math.floor((chat_time-hours*3600)/60);
        var secs = chat_time - hours*3600 - mins*60;
        timer.html(pad(hours)+":"+pad(mins)+":"+pad(secs));
    }
    function pad(d) {
        return (d < 10) ? '0' + d.toString() : d.toString();
    }

    close_btn.click(function () {
        //save record
        stopArchive();
        location.href = "<?=base_url()?>dashboard";
    });

    function startArchive() {
        $.ajax({
            url: herok_url + "archive/start",
            type: "post",
            contentType: "application/json",
            data: JSON.stringify({"sessionId": sessionId}),
            dataType: 'json',

            success: function (data) {
                alert(data);
            }
        });
    }

    function stopArchive() {
        $.ajax({
            url : herok_url+"archive/"+archiveID+"/stop",
            type : "post"
        });
    }

    toggle_mic.click(function () {
        if(is_mic)
        {
            toggle_mic.css("color","#ff1237" );

        }
        else{
            toggle_mic.css("color","#28ffaa" );
        }
        is_mic = !is_mic;
        publisher.publishAudio(is_mic);
    });

    toggle_audio.click(function () {
        if(is_audio)
        {
            toggle_audio.css("color","#ff1237" );
        }
        else{
            toggle_audio.css("color","#28ffaa" );
        }
        is_audio = !is_audio;
        subscriber.subscribeToAudio(is_audio);
        other_person.subscribeToAudio(is_audio);
    });


</script>

