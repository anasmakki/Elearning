$(document).ready(function(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    // AJAX Call form Already exist Email  Verification
    $("#stuemail").on("keypress blur", function(){
        var stuemail = $("#stuemail").val();
        $.ajax({
            url:"Student/addstudent.php",
            method:"Post",
            data: {
                checkemail : "CheckEmail",
                stuemail:stuemail,
            },
            success: function (data){
                if(data != 0){
                    $("#errorMsg2").html("<small style='color:red'>Email Already Used!</small>");
                    $("#signup").attr("disabled", true);
                }
                else if(data == 0 && reg.test(stuemail)){
                    $("#errorMsg2").html("<small style='color:green'>There You Go!</small>");
                    $("#signup").attr("disabled", false);
                }
            },
        });
    });
});




function addStu(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    // Checking Empty fields
    if(stuname.trim() == ""){
        $("#errorMsg1").html("<small style='color:red'>Enter Your Name!</small>");
        $("#stuname").focus();
        return false;
    }
    else if(stuemail.trim() == ""){
        $("#errorMsg2").html("<small style='color:red'>Enter Your Email!</small>");
        $("#stuemail").focus();
        $("#errorMsg1").html(" ");
        return false;
    }
    else if(stuemail.trim() != "" && !reg.test(stuemail)){
        $("#errorMsg2").html("<small style='color:red'>Please Enter Valid Email e.g. example@mail.com</small>");
        $("#stuemail").focus();
        $("#errorMsg1").html(" ");
        return false;
    }
    else if(stupass.trim() == ""){
        $("#errorMsg3").html("<small style='color:red'>Enter Your Password!</small>");
        $("#stupass").focus();
        $("#errorMsg1").html(" ");
        $("#errorMsg2").html(" ");
        return false;
    }
    else{
        $.ajax({
            url: './Student/addstudent.php',
            method: 'POST',
            dataType : "json",
            data: {
                stusignup: 'stusignup',
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
            },
            success: function (data){
                if(data == "OK"){
                    $("#successMsg").html("<span class='alert alert-success'>Registration Successful!</span>");
                    clearStuRegFields();
                } else {
                    $("#successMsg").html("<span class='alert alert-danger'>Failed to Register!</span>");
                }
            }
        });
    }

}

// Empty all fields and error messages
function clearStuRegFields(){
    $("#stuRegForm").trigger("reset");
    $("#errorMsg1").html(" ");
    $("#errorMsg2").html(" ");
    $("#errorMsg3").html(" ");
}


// Student Login Verification
function checkStuLogin() {
    var stuLogEmail = $("#stulogemail").val();
    var stuLogPass = $("#stulogpass").val();
    $.ajax({
        url: './Student/addstudent.php',
        method : "POST",
        data : {
            checkLogEmail : "CheckLogEmail",
            stuLogEmail : stuLogEmail,
            stuLogPass : stuLogPass,
        },
        success : function(data){
            if(data == 0){
                $("#statusLogMsg").html("<small class='alert alert-danger'>Invalid Email or Password</small>");
            }
            else if(data == 1){
                $("#statusLogMsg").html("<span class='spinner-border text-success' role='status'></span>");

                setTimeout(()=>{
                    window.location.href = 'Student/studentProfile.php';
                }, 1000);
            }
        },
    })
}