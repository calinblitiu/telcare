/**
 * Created by rubby on 8/18/2017.
 */
$('.patient-schedule-btn').click(function(){
    $("#patient-setschedule-form").ajaxSubmit({
        url: baseURL + "set_schedule",
        type: 'post',
        dataType: "json",
        success: function (data) {
            if (data.success == 1) {
                alert(data.error);
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

var attact_history;

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

        $("#patient-attach-form")[0].reset();
    };
    reader.readAsDataURL(this.files[0]);

});