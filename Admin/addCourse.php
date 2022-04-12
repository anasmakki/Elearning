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

    if(isset($_POST['courseSubmitBtn'])){
        // Checking Empty Fields
        if($_POST['course_name'] == "" || $_POST['course_desc'] == "" || $_POST['course_author'] == "" || $_POST['course_duration'] == "" || $_POST['course_original_price'] == "" || $_POST['course_price'] == "")  {

            $msg = '<div class="alert alert-danger mt-2">Please Fill All Fields</div>';
            
        } else {
            $course_name = $_POST['course_name'];
            $course_desc = $_POST['course_desc'];
            $course_author = $_POST['course_author'];
            $course_duration = $_POST['course_duration'];
            $course_original_price = $_POST['course_original_price'];
            $course_price = $_POST['course_price'];

            $course_img = $_FILES['course_img']['name'];
            $course_img_temp = $_FILES['course_img']['tmp_name'];
            $img_folder = '../images/courseimages/'.$course_img;
            move_uploaded_file($course_img_temp, $img_folder);


            // Sending Data to Database
            $sql = "INSERT INTO course(course_name, course_desc, course_author, course_duration, course_original_price, course_price, course_img) VALUES ('$course_name', '$course_desc', '$course_author', '$course_duration', '$course_original_price', '$course_price', '$img_folder')";

            $result = $conn->query($sql);
            if($result){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';
            }
            else{
                $msg = '<div class="alert alert-info mt-2">Failed to add Course</div>';
            }
        }
    }
?>


<div class="col-sm-6 mt-5 mx-auto jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-2">
            <input class="form-control" type="text" name="course_name" id="course_name" placeholder="Course Name">
        </div>
        <div class="form-group mb-2">
            <textarea class="form-control" type="text" name="course_desc" id="course_desc" placeholder="Course Description"></textarea>
        </div>
        <div class="form-group mb-2">
            <input class="form-control" type="text" name="course_author" id="course_author" placeholder="Course Author">
        </div>
        <div class="form-group mb-2">
            <input class="form-control" type="text" name="course_duration" id="course_duration" placeholder="Course Duration">
        </div>
        <div class="form-group mb-2">
            <input class="form-control" type="text" name="course_original_price" id="course_original_price" placeholder="Course Original Price">
        </div>
        <div class="form-group mb-2">
            <input class="form-control" type="text" name="course_price" id="course_price" placeholder="Course Selling Price">
        </div>
        <div class="form-group mb-2">
            <label for="course_img">Course Image</label>
            <input class="form-control-file" type="file" name="course_img" id="course_img" placeholder="Course Image">
        </div>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a class="btn btn-primary" href="courses.php">Close</a>
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