/**
 * Created by rubby on 8/15/2017.
 */
/**
 * Created by rubby on 8/14/2017.
 */

$('.signup-patient-btn').click(function(){
    $("#patient-signup-form").ajaxSubmit({
        url: baseURL + "signup_patient",
        type: 'post',
        dataType: "json",
        success: function (data) {
            if (data.success == 1) {
                alert("sign up success");
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

$('#patient_signup_dob').datepicker({
    format: "yyyy-mm-dd"
});
