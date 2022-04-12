// Admin Login Verification
function checkAdminLogin() {
    var adminLogEmail = $("#adminlogemail").val();
    var adminLogPass = $("#adminlogpass").val();

    console.log(adminLogEmail);
    console.log(adminLogPass);

    $.ajax({
        url: './Admin/admin.php',
        method : "POST",
        data : {
            checkLogEmail : "CheckLogEmail",
            adminLogEmail : adminLogEmail,
            adminLogPass : adminLogPass,
        },
        success : function(data){
            if(data == 0){
                console.log(data);
                $("#statusAdminLogMsg").html("<small class='alert alert-danger'>Invalid Email or Password</small>");
            }
            else if(data == 1){
                console.log(data);
                $("#statusAdminLogMsg").html("<span class='spinner-border text-success' role='status'></span>");

                setTimeout(()=>{
                    window.location.href = 'Admin/adminDashboard.php';
                }, 1000);
            }
        },
    })
}