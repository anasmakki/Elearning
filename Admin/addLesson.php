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

    if(isset($_POST['lessonSubmitBtn'])){
        // Checking Empty Fields
        if($_POST['lesson_name'] == "" || $_POST['lesson_desc'] == "")  {

            $msg = '<div class="alert alert-danger mt-2">Please Fill All Fields</div>';
            
        } else {
            $lesson_name = $_POST['lesson_name'];
            $lesson_desc = $_POST['lesson_desc'];
            $lesson_link = $_FILES['lesson_link']['name'];
            $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
            $link_folder = '../lessonvid/' . $lesson_link;
            move_uploaded_file($lesson_link_temp, $link_folder);

            $course_id = $_SESSION['course_id'];
            $course_name = $_SESSION['course_name'];


            // Sending Data to Database
            $sql = "INSERT INTO lesson(lesson_name, lesson_desc, lesson_link, course_id, course_name) VALUES ('$lesson_name', '$lesson_desc', '$link_folder', '$course_id', '$course_name')";

            $result = $conn->query($sql);
            if($result){
                $msg = '<div class="alert alert-success mt-2">New Lesson Added Successfully!</div>';
            }
            else{
                $msg = '<div class="alert alert-info mt-2">Failed to add Lesson</div>';
            }
        }
    }
?>


<div class="col-sm-6 mt-5 mx-auto jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <input class="form-control" type="text" name="stu_name" id="stu_name" placeholder="Course ID" value="<?php echo $_SESSION['course_id'] ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <input class="form-control" type="email" name="stu_email" id="stu_email" placeholder="Course Name" value="<?php echo $_SESSION['course_name'] ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <input class="form-control" type="text" name="lesson_name" id="lesson_name" placeholder="Lesson Name">
        </div>
        <div class="form-group mb-3">
            <input class="form-control" type="text" name="lesson_desc" id="lesson_desc" placeholder="Lesson Description">
        </div>
        <div class="form-group mb-3">
            <label for="lesson_link">Lesson Link</label>
            <input class="form-control-file" type="file" name="lesson_link" id="lesson_link">
        </div>
        
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="lessonSubmitBtn" name="lessonSubmitBtn">Add Lesson</button>
            <a class="btn btn-primary" href="lessons.php">Close</a>
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