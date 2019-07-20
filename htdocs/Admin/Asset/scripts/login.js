

function fnc_Login() {
    var user = $("#username").val();
    var pass = $("#password").val();
    var check = true;
    if (user === "" || user === undefined || user === null) {
        check = false
        showError("errorusername","Username không được trống");
    }else{
        showError("errorusername","");
    }
    if (pass === "" || pass === undefined || pass === null) {
        check = false
        showError("errorpassword","Password không được trống");
    }else{
        showError("errorpassword","");
    }
    if(check){
        $("#frlogin").submit();
    }else{

    }
}
$(document).ready(function () {
    // $("#frlogin").validate({
    //     rules: {
    //         usernam: "required",
    //         password: "required",
    //         // diachi: {
    //         //     required: true,
    //         //     minlength: 2
    //         // }
    //     },
    //     messages: {
    //         usernam: "Vui lòng nhập usernam",
    //         password: "Vui lòng nhập password",
    //         // diachi: {
    //         //     required: "Vui lòng nhập địa chỉ",
    //         //     minlength: "Địa chỉ ngắn vậy, chém gió ah?"
    //         // }
    //     }
    // });
});

function showError(id,strerror){
    if(strerror === ""){
        $("#" + id ).text("");
        $("#" + id ).hide();
    }else{
        $("#" + id ).text(strerror);
        $("#" + id ).show();
    }
    
}