<!-- Include admininclude - header.php -->
<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include('admininclude/header.php');
    include('../dbConnection.php');

    if(isset($_SESSION['is_admin_login'])){
        $adminEmail = $_SESSION['adminLogEmail'];
    }
    else {
        echo "<script> location.href = '../index.php'; </script>";
    }


    // Updating Data PHP Code
    if(isset($_POST['stuEditBtn'])){
        // Checking Empty Fields
        if(($_POST['stu_id'] == "" ) || ($_POST['stu_name'] == "" ) ||($_POST['stu_email'] == "" )){   
            // MSg if empty fields
            $msg = '<span class="alert alert-danger col-sm-6 ml-5 mt-2">Please Fill All Fields</span>';
        } else {
            // Assigning Values to variables
            $stu_id = $_POST['stu_id'];
            $stu_name = $_POST['stu_name'];
            $stu_email = $_POST['stu_email'];

            // SQL Code
            $sql = "UPDATE student SET stu_name='$stu_name', stu_email='$stu_email' WHERE stu_id='$stu_id'";

            $result = $conn->query($sql);
            if($result == TRUE){
                // $msg = '<span class="alert alert-success mt-2">Student Record Updated Successfully</span>';
                echo "<script>
                    alert('Record Edited Successfully');
                    location.href='students.php';
                </script>";
            } else{
                $msg = '<span class="alert alert-info col-sm-6 ml-5 mt-2">Unable to Update</span>';
            }
        }
    }
?>

<div class="col-sm-6 mt-5 mx-auto jumbotron">
    <h3 class="text-center">Edit Student Details</h3>

    <!-- Edit Student Details PHP Code -->
    <?php 
        if(isset($_POST['edit'])){
            $sql = "SELECT * FROM student WHERE stu_id = {$_REQUEST['stu_id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <input class="form-control" type="text" name="stu_id" id="stu_id" placeholder="Student ID" value="<?php if(isset($row['stu_id'])) {echo $row['stu_id'];} ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <input class="form-control" type="text" name="stu_name" id="stu_name" placeholder="Student Name" value="<?php if(isset($row['stu_name'])) {echo $row['stu_name'];} ?>">
        </div>
        <div class="form-group mb-3">
            <input class="form-control" type="text" name="stu_email" id="stu_email" placeholder="Student Email" value="<?php if(isset($row['stu_email'])) {echo $row['stu_email'];} ?>">
        </div>
        
        <div class="text-center">
            <?php
            if(isset($msg)){
                echo $msg;
            } 
            ?>
            <button class="btn btn-danger" type="submit" id="stuEditBtn" name="stuEditBtn">Save Changes</button>
            <a class="btn btn-primary" href="students.php">Close</a>
        </div>
    </form>
    <?php } ?>
</div>


<!-- Include admininclude - footer.php -->
<?php
    include('admininclude/footer.php');
?>