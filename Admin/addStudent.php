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

    if(isset($_POST['stuSubmitBtn'])){
        // Checking Empty Fields
        if($_POST['stu_name'] == "" || $_POST['stu_email'] == "" || $_POST['stu_pass'] == "")  {

            $msg = '<div class="alert alert-danger mt-2">Please Fill All Fields</div>';
            
        } else {
            $stu_name = $_POST['stu_name'];
            $stu_email = $_POST['stu_email'];
            $stu_pass = $_POST['stu_pass'];


            // Sending Data to Database
            $sql = "INSERT INTO student(stu_name, stu_email, stu_pass) VALUES ('$stu_name', '$stu_email', '$stu_pass')";

            $result = $conn->query($sql);
            if($result){
                $msg = '<div class="alert alert-success mt-2">New Student Added Successfully!</div>';
            }
            else{
                $msg = '<div class="alert alert-info mt-2">Failed to add Student</div>';
            }
        }
    }
?>


<div class="col-sm-6 mt-5 mx-auto jumbotron">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control" type="text" name="stu_name" id="stu_name" placeholder="Student Name">
        </div>
        <div class="form-group">
            <input class="form-control" type="email" name="stu_email" id="stu_email" placeholder="Student Email">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="stu_pass" id="stu_pass" placeholder="Student New Password">
        </div>
        
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="stuSubmitBtn" name="stuSubmitBtn">Submit</button>
            <a class="btn btn-primary" href="students.php">Close</a>
            <?php
            if(isset($msg)){
                echo $msg;
            } 
            ?>
        </div>
    </form>
</div>

<!-- Include admininclude - footer.php -->
<?php
    include('admininclude/footer.php');
?>