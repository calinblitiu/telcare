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
    <link href='<?=base_url()?>assets/global/plugins/fullcalendar/fullcalendar.css' rel='stylesheet' />
    <link href='<?=base_url()?>assets/global/plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='<?=base_url()?>assets/global/plugins/fullcalendar/lib/moment.min.js'></script>
    <script src='<?=base_url()?>/assets/global/plugins/fullcalendar/fullcalendar.min.js'></script>
    <script src="https://checkout.stripe.com/checkout.js"></script>


</head>

<body>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Header
</div>

<div class="row mokup-border" style="height: 150%; margin: 50px 10%;text-align: center;">
    <div class="col-md-12" style="height: 100%;padding: 0;">
        <div class="row" style="height: 15%;">
            <div class="col-md-9" style="height:100%;">
                <div class="mokup-border" style="height: 75%; margin: 3% 1%;">

                    <div style="">
                    Welcome <?php if($this->session->userdata("gender") == "0") {echo "Ms";}else{echo "Mr";} ?> <?=$this->session->userdata("fname")." ".$this->session->userdata('lname')?> <br>
                    DOB : <?=$this->session->userdata('dob')?><br>
                    Email : <?=$this->session->userdata("email")?><br>
                    SSN : <?=$this->session->userdata("ssn")?><br>
                    Address : <?=$this->session->userdata("addr")?><br>
                    Phone : <?=$this->session->userdata('phone')?>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="height: 100%">
                <img src="<?=base_url()?>assets/uploads/patient/<?=$this->session->userdata("img")?>" class="mokup-border" style="height: 90%;">
            </div>
        </div>
        <div class="row" style="height: 85%; margin: 0;">
            <div class="col-md-3 mokup-border" style="height: 100%;padding: 0;text-align: center;position: relative;">
                <div class="mokup-border" style="width: 80%; margin: 5%">Dashboard</div>
                <div class="mokup-border" style="width: 80%; margin: 5%;text-align: center;">Waiting Room<br>
                    <?php if($waitingroom):?>
                        <div class="waitingroom-item" style="cursor: pointer;padding:5px;background-color: #ddd;width: 100%;"><?=$doctor['fname']?> <?=$doctor['lname']?> <?=$waitingroom["id"]?></div>
                    <?php endif;?>
                </div>
                <div class="mokup-border" style="width: 80%; margin: 5%">
                    <a href="#upload-part">Upload</a>
                </div>
                <div class="mokup-border" style="width: 80%; margin: 5%">
                    <a href="#calendar-part">Schedule appointment</a>
                </div>

                <div class="mokup-border" style="width: 80%; margin: 5%">
                    <a href="#prior_consult">Prior Consults</a>
                </div>

                <button class="btn btn-default logout-btn">Logout</button>

                <a  href="<?=base_url()?>accounts_page" class="mokup-border" style="width: 80%; left: 5%; position: absolute; bottom: 5%;">Account Setting</a>
            </div>
            <div class="col-md-9" style="height: 100%;">
                <div class="row mokup-border" style="height: 100%;position: relative;">
                    <div class="row mokup-border" style="width:90%; margin: 5% 5% 0 5%; text-align: center;" id="upload-part">

                        <form action="<?=base_url()?>upload_patient_files" class="dropzone" id="my-dropzone" style="min-height: 20%;">
                            <input type="hidden" name="token" value="<?=$this->session->userdata('token')?>">
                        </form>

                    </div>

                    <div class="row mokup-border" style="width:90%;margin: 0 50% 0 5%;text-align: center;height: 20%;overflow-y: scroll;">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAME</th>

                            </tr>
                            </thead>
                            <tbody id="uploads-list">

                            </tbody>
                        </table>
                    </div>
                    <div class="row mokup-border" style="width:90%;margin: 5% 5%; text-align: center;padding: 5% 20%;" id="calendar-part">
                        <div id='calendar'></div>
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>

<div class="row mokup-border" style="height: 100px; margin: 0 10% 50px 10%;text-align: center;">
    Prior Consults
</div>

<div class="row mokup-border" style="margin: 0 20% 50px 20%;text-align: center;" id="prior_consult">
    <table class="table table-hover">
        <thead >
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody id="prior_consults">

        </tbody>
    </table>
</div>


<div id="paymodal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Pay and Add Schedule</h4>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>b_check_out" method="POST">

                    <div class="form-body">
                        <form role="form" action="<?=base_url()?>set_schedule" method="post" id="patient-setschedule-form">
                            <input type="hidden" name="token" value="<?=$this->session->userdata('token')?>">
                            <div class="form-group has-success">
                                <label class="control-label">Input Date</label>
                                <input type="text" class="form-control" id="patient_schedule_date" name="date" placeholder="Schedule Date">
                            </div>

                            <div class="form-group has-success">
                                <label class="control-label">Input Note</label>
                                <textarea class="form-control" id="patient_schedule_note" name="note" placeholder="Schedule note"></textarea>
                            </div>

                            <div class="form-group has-success hide">
                                <label class="control-label">Input History</label>
                                <input type="hidden" class="form-control" id="patient_schedule_history" name="history" placeholder="Schedule History">
                            </div>

                    </div>
                </form>
                <form role="form" action="<?=base_url()?>upload_history_attach" method="post" id="patient-attach-form" enctype='multipart/form-data'>
                    <div class="form-group has-success">
                        <label class="control-label">Upload History File</label>
                        <input type="hidden" name="token" value="<?=$this->session->userdata('token')?>">
                        <input type="file" class="form-control" id="patient_schedule_file" name="img">
                        <div id="file_preview"></div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="reset patient-schedule-reset-btn" class="btn default">Reset</button>
                <button type="button" class="btn red patient-schedule-btn">Add New Schedule</button>
            </div>
        </div>

    </div>
</div>


<script>

    var my_id = "<?=$this->session->userdata('patient_id')?>";
    var my_type  = "patient";
    var my_token = "<?=$this->session->userdata('token')?>";
    var msgTxt = $("#chat-message-input");
    var chat_msg_count = 0;
    var upload_list = $("#uploads-list");
    var pay_modal = $("#paymodal");

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
                            getUploads();

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

    function getUploads()
    {
        $.ajax({
            url : baseURL+"getuploads",
            type : "post",
            dataType : 'json',
            data : {token : my_token},
            success : function (data)
            {
                upload_list.html("");
                for(var i=0;i<data.length;i++)
                {
                    upload_list.append("\
                        <tr>\
                            <td>"+i+"</td>\
                            <td><a href='"+data[i]+"'>Uploaded File "+i+"</a></td>\
                        </tr>\
                    ");
                }
            },
            fail : function (err) {
                alert(err);
            }
        });
    }
    getUploads();

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

            //pay_modal.modal('show');
            var nowdate = new Date();
            var before_date = new Date(nowdate);
            before_date.setDate(nowdate.getDate()-1);

            var curdate = new Date(start);

          if(before_date.getTime()>curdate.getTime()) {
              alert("Don't select before day.");
              return;
          }
            handler.open({
                name: 'Pay With Stripe',
                description: 'You have to purcharse to set schedule',
                amount: 2000
            });
        },
        visibleRange : {
          start : new Date()
        },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: {
            url: baseURL+"getschedules",
            type : 'post',
            data : {token : my_token},
            error: function() {
                $('#script-warning').show();
            }
        },
        loading: function(bool) {
            $('#loading').toggle(bool);
        }

    });


    var handler = StripeCheckout.configure({
        key: 'pk_test_m24ptzwSZcm4cdtbNsbXsiF8',
        image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
        locale: 'auto',
        email : "sky.dream2018@yandex.com",
        token: function(token) {
            // You can access the token ID with `token.id`.
            // Get the token ID to your server-side code for use.
            $.ajax({
                url : baseURL+"b_check_out",
                type : "post",
                dataType : 'json',
                data : {token : my_token, stripeToken : token.id, amount : 2000},
                success : function (data)
                {
                    if(data.success == 1)
                    {
                        getUploads();
                        pay_modal.modal({
                            backdrop : 'static',
                            keyboard : false
                        });

                        $('#calendar').fullCalendar({
                            events : {
                                url: baseURL+"getschedules",
                                type : 'post',
                                data : {token : my_token},
                                error: function() {
                                    $('#script-warning').show();
                                }
                            }
                        });
                    }
                    else if(data.success == 0)
                    {
                        alert(data.error)
                    }
                },
                fail : function (err) {
                    alert(err);
                }
            });

        }
    });



    // Close Checkout on page navigation:
    window.addEventListener('popstate', function() {
        handler.close();
    });

</script>

<script>


    $('.patient-schedule-btn').click(function(){

        var date = $('#patient_schedule_date').val();
        var note = $('#patient_schedule_note').val();
        var history = $('#patient_schedule_history').val();

        if(date == "" || note == "" || history == "")
        {
            alert('please input all data');
            return;
        }
        var post_data = {
            token : my_token,
            date : date,
            note : note,
            history : history
        };
        $.ajax({
            url: baseURL + "set_schedule",
            type: 'post',
            dataType: "json",
            data : post_data,
            success: function (data) {
                if (data.success == 1) {
                    alert(data.error);
                    pay_modal.modal('hide');
                }
                else if (data.success == 0) {
                    alert(data.error);
                }
            },
            fail: function (err) {
                alert();
            }
        });
    });

    $('#patient_schedule_date').datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        autoclose: true
    });

    $("#patient_schedule_file").change(function() {
        var file = this.files[0];
        if(file == undefined)
        {
            return;
        }
        var imagefile = file.type;
        var reader = new FileReader();
        reader.onload = function(e){
            $.ajax({
                url: baseURL+"upload_history_attach", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(document.getElementById("patient-attach-form")), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                dataType: "json",
                success: function(data)   // A function to be called if request succeeds
                {
                    if(data.success == 1){
                        $('#file_preview').append("<span>"+data.data.img+"</span><br>");
                        var old_data = $('#patient_schedule_history').val();
                        var new_data = '';
                        if(old_data == "")
                        {
                            new_data = data.data.img;
                        }
                        else{
                            new_data = old_data+","+data.data.img;
                        }
                        $('#patient_schedule_history').val(new_data);
                    }
                    else{
                        alert(data.error);
                    }
                },
                fail : function (err) {
                    alert(err);
                }
            });
        };
        reader.readAsDataURL(this.files[0]);

    });

    //logout
    $(".logout-btn").click(function () {
        $.ajax({
            url : baseURL+"logout_patient",
            type : "post",
            data : {token: my_token}
        });
        location.href = baseURL+"login";
    })

</script>


</body>

