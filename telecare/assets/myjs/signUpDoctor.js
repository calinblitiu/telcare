/**
 * Created by rubby on 8/14/2017.
 */

$('.signup-doctor-btn').click(function(){
    $("#doctor-signup-form").ajaxSubmit({
        url: baseURL + "signup_doctor",
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
