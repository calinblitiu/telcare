/**
 * Created by rubby on 8/14/2017.
 */
$('.doctor-login-btn').click(function(){
    $("#doctor-login-form").ajaxSubmit({
        url: baseURL + "login_doctor",
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

        }
    });
});
