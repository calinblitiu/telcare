<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 9/1/2017
 * Time: 1:58 PM
 */?>
<?php $this->load->view('mokup/layout/common');?>
<script src="https://static.opentok.com/v2/js/opentok.js"></script>

<div style="position: fixed;top: 0;left: 40%;z-index: 10000;">
    <span style="font-size: 30px;color: #28ffaa;cursor: pointer;" id="toggle_video"><i class="glyphicon glyphicon-facetime-video"></i></span>
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
    var chat_msg_count = 0;
    var message_contents = $("#message_contents");
    var is_video = true;
    var toggle_video = $("#toggle_video");

    var my_id = "<?=$this->session->userdata('patient_id')?>";
    var my_type  = "patient";
    var my_token = "<?=$this->session->userdata('token')?>";

    var connected_count = 0;

    publisher_width = publisher_div.width();
    publisher_div.height(publisher_width);

    added_person_width = added_person.width();
    added_person.height(added_person_width);

    chat_box.height($(window).height()-publisher_width-added_person_width-8);

    $(window).on('resize',function () {
        publisher_width = publisher_div.width();
        publisher_div.height(publisher_width);
        added_person_width = added_person.width();
        added_person.height(added_person_width);
        chat_box.height($(window).height()-publisher_width-added_person_width-8);
    });


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
        response;
    var publisher;
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
                    height: '100%'
                };

                if(connected_count == 1) {
                    session.subscribe(event.stream, 'subscriber', subscriberOptions, function (error) {
                        if (error) {
                            console.log('There was an error publishing: ', error.name, error.message);
                        }
                    });
                }
                if(connected_count == 2)
                {
                    session.subscribe(event.stream, 'added_person', subscriberOptions, function (error) {
                        if (error) {
                            console.log('There was an error publishing: ', error.name, error.message);
                        }
                    });
                }
            });

            session.on('sessionDisconnected', function(event) {
                connected_count --;
                console.log('You were disconnected from the session.', event.reason);
            });

            session.on("streamDestroyed",function () {
                connected_count--;
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
//                    publisher.publishVideo(false);
                } else {
                    console.log('There was an error connecting to the session: ', error.name, error.message);
                }
            });

            // Receive a message and append it to the history

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
                message_contents.append(append_msg);
                chat_msg_count++;
                message_contents.animate({scrollTop:chat_msg_count*50 },1000);

            });
        }

        // Text chat



        msg_input.keypress(function (ev) {
            var key = ev.which;
            if(key == 13)
            {
                session.signal({
                    type: 'msg',
                    data: {msg : msg_input.val(),sender : my_id,sender_type : my_type}
                }, function(error) {
                    if (error) {
                        console.log('Error sending signal:', error.name, error.message);
                    } else {
                        msg_input.val();
                    }
                });
            }
        });

    }

</script>
