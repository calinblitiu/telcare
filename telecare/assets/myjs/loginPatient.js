/**
 * Created by rubby on 8/15/2017.
 */

$('.patient-login-btn').click(function(){
    $("#patient-login-form").ajaxSubmit({
        url: baseURL + "login_patient",
        type: 'post',
        dataType: "json",
        success: function (data) {
            if (data.success == 1) {
                alert("login success");
            }
            else if (data.success == 0) {
                alert(data.error);
            }
        },
        fail: function (err) {
            alert(err);
        }
    });
});

