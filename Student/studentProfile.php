<!-- Stu Header Inlcude Start -->
<?php
include('stuInclude/header.php');
?>
<!-- Stu Header Inlcude End -->


<!-- Body Start -->

<!-- Send Data to Database - PHP Code -->
<?php 
if(isset($_REQUEST['stuUpdateBtn'])){
    // Checking Empty fields
    if($_REQUEST['stuName'] == "" || $_REQUEST['stuOcc'] ==""){
        $msg = '<div class="alert alert-danger mt-2">Please Fill All Fields</div>';
    } else {
        $stuName = $_REQUEST['stuName'];
        $stuOcc = $_REQUEST['stuOcc'];


        $stuImg = $_FILES['stuImg']['name'];
        $stuImg_temp = $_FILES['stuImg']['tmp_name'];
        $stuImg_folder = '../images/studentimages/' . $stuImg;
        move_uploaded_file($stuImg_temp, $stuImg_folder);

        // Update Query
        $sql = "UPDATE student SET stu_name = '$stuName', stu_occ = '$stuOcc', stu_img = '$stuImg_folder' WHERE stu_email = '$stu_email' ";
        $result = $conn->query($sql);
        if($result == TRUE){
            $msg = '<div class="alert alert-success mt-2">Record Update Successfully</div>';            
        }
    }
}
?>


<div class="col-sm-6 mr-auto ml-auto jumbotron">
    <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="stuID">Student ID</label>
                <input type="text" class="form-control" name="stuID" id="stuID" value="<?php if(isset($stu_id)) {echo $stu_id;} ?>" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="stuEmail">Email</label>
                <input type="text" class="form-control" name="stuEmail" id="stuEmail" value="<?php if(isset($stu_email)) {echo $stu_email;} ?>" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="stuName">Name</label>
                <input type="text" class="form-control" name="stuName" id="stuName" value="">
            </div>
            <div class="form-group mb-3">
                <label for="stuOcc">Occupation</label>
                <input type="text" class="form-control" name="stuOcc" id="stuOcc" value="">
            </div>
            <div class="form-group mb-3">
                <label for="stuImg">Uploade Image</label>
                <input type="file" class="form-control-file" name="stuImg" id="stuImg">
            </div>
            <div class="form-group mb-3">
                <input type="submit" class="btn btn-primary" value="Update" name="stuUpdateBtn" id="stuUpdateBtn">
            </div>
            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>
    </form>
</div>

<!-- Body End -->


<!-- Stu Footer Inlcude Start -->
<?php
include('stuInclude/footer.php');
?>
<!-- Stu Footer Inlcude End -->