<!-- Stu Header Inlcude Start -->
<?php
include('stuInclude/header.php');
?>
<!-- Stu Header Inlcude End -->

<!-- Change Password PHP Code -->
<?php 
if(isset($_POST['changePassword'])){
    // Checking Empty Field
    if($_POST['stu_pass'] == ""){
        $msg = "<div class='alert alert-danger mt-2'>Password Can't be blank!</div>";
    } else {
        $stu_pass = $_POST['stu_pass'];
        $sql = "UPDATE student SET stu_pass = '$stu_pass' WHERE stu_email = '$stu_email' ";
        $result = $conn->query($sql);
        if($result == TRUE){
            $msg = "<div class='alert alert-success mt-2'>Password Changed Successfully!</div>";           
        } else {
            $msg = "<div class='alert alert-danger mt-2'>Password Not Change! Please try again later</div>";
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-auto jumbotron">
    <h3 class="text-center">Change Student Password</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <input class="form-control" type="text" name="stu_email" id="stu_email" value="<?php if(isset($stu_email)){echo $stu_email; } ?>" readonly>
        </div>

        <div class="form-group mb-3">
            <input class="form-control" placeholder="Enter New Password" type="text" name="stu_pass" id="stu_pass">
        </div>
        
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="changePassword" name="changePassword">Change Password</button>
            <?php 
            if(isset($msg)){echo $msg;}
            ?>
        </div>
    </form>
</div>

<!-- Stu Footer Inlcude Start -->
<?php
include('stuInclude/footer.php');
?>
<!-- Stu Footer Inlcude End -->