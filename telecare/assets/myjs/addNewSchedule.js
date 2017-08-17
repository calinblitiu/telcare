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

$('#patient_schedule_date').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true
});
