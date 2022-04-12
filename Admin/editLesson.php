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
    if(isset($_POST['lessonEditBtn'])){
        // Checking Empty Fields
        if(($_POST['lesson_name'] == "" ) || ($_POST['lesson_desc'] == "" )){   
            // MSg if empty fields
            $msg = '<span class="alert alert-danger col-sm-6 ml-5 mt-2">Please Fill All Fields</span>';
        } else {
            // Assigning Values to variables
            $lesson_id = $_POST['lesson_id'];
            $lesson_name = $_POST['lesson_name'];
            $lesson_desc = $_POST['lesson_desc'];
            $lesson_link = $_FILES['lesson_link'];

            $lesson_link = $_FILES['lesson_link']['name'];
            $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
            $lesson_folder = '../lessonvid/'.$lesson_link;
            move_uploaded_file($lesson_link_temp, $lesson_folder);

            // SQL Code
            $sql = "UPDATE lesson SET lesson_name='$lesson_name', lesson_desc='$lesson_desc', lesson_link='$lesson_link' WHERE lesson_id='$lesson_id'";

            $result = $conn->query($sql);
            if($result == TRUE){
                // $msg = '<span class="alert alert-success mt-2">Lesson Record Updated Successfully</span>';
                echo "<script>
                    alert('Record Edited Successfully');
                    location.href='lessons.php';
                </script>";
            } else{
                $msg = '<span class="alert alert-info col-sm-6 ml-5 mt-2">Unable to Update</span>';
            }
        }
    }
?>

<div class="col-sm-6 mt-5 mx-auto jumbotron">
    <h3 class="text-center">Edit Lesson Details</h3>

    <!-- Edit Lesson Details PHP Code -->
    <?php 
        if(isset($_POST['edit'])){
            $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['lesson_id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID:</label>
            <input class="form-control" type="text" name="course_id" id="course_id" value="<?php if(isset($row['course_id'])) {echo $row['course_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input class="form-control" type="text" name="course_name" id="course_name" value="<?php if(isset($row['course_name'])) {echo $row['course_name'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_id">Lesson ID:</label>
            <input class="form-control" type="text" name="lesson_id" id="lesson_id" value="<?php if(isset($row['lesson_id'])) {echo $row['lesson_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name:</label>
            <input class="form-control" type="text" name="lesson_name" id="lesson_name" value="<?php if(isset($row['lesson_name'])) {echo $row['lesson_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description:</label>
            <input class="form-control" type="text" name="lesson_desc" id="lesson_desc" value="<?php if(isset($row['lesson_desc'])) {echo $row['lesson_desc'];} ?>">
        </div>

        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?php if(isset($row['lesson_link'])) {echo $row['lesson_link'];} ?>" frameborder="0" class="embed-responsive-item" allowfullscreen></iframe>
            </div>
            <input type="file" class="form-control-file" name="lesson_link" id="lesson_link">
        </div>
        
        
        <div class="text-center">
            <?php
            if(isset($msg)){
                echo $msg;
            } 
            ?>
            <button class="btn btn-danger" type="submit" id="lessonEditBtn" name="lessonEditBtn">Save Changes</button>
            <a class="btn btn-primary" href="lessons.php">Close</a>
        </div>
    </form>
    <?php } ?>
</div>


<!-- Include admininclude - footer.php -->
<?php
    include('admininclude/footer.php');
?>