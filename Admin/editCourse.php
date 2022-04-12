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
    if(isset($_POST['courseEditBtn'])){
        echo "<button>Entered after condition true</button>";
        // Checking Empty Fields
        if(($_POST['course_id'] == "" ) || ($_POST['course_name'] == "" ) ||($_POST['course_desc'] == "" ) ||($_POST['course_author'] == "" ) ||($_POST['course_duration'] == "" ) ||($_POST['course_original_price'] == "" ) ||($_POST['course_price'] == "" )){   
            // MSg if empty fields
            $msg = '<span class="alert alert-danger col-sm-6 ml-5 mt-2">Please Fill All Fields</span>';
        } else {
            // Assigning Values to variables
            $course_id = $_POST['course_id'];
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

            // $course_img = "../images/courseimages". $_FILES['course_img']['name'];

            // SQL Code
            $sql = "UPDATE course SET course_name='$course_name', course_desc='$course_desc', course_author='$course_author', course_duration='$course_duration', course_original_price='$course_original_price', course_price='$course_price', course='$course_img' WHERE course_id='$course_id' ";

            $result = $conn->query($sql);
            if($result){
                $msg = '<span class="alert alert-success col-sm-6 ml-5 mt-2">Course Updated Successfully</span>';
            } else{
                $msg = '<span class="alert alert-info col-sm-6 ml-5 mt-2">Unable to Update</span>';
            }
        }
    }
?>

<div class="col-sm-6 mt-5 mx-auto jumbotron">
    <h3 class="text-center">Edit Course Details</h3>

    <!-- Edit Course Details PHP Code -->
    <?php 
        if(isset($_POST['edit'])){
            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['course_id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control" type="text" name="course_id" id="course_id" placeholder="Course ID" value="<?php if(isset($row['course_id'])) {echo $row['course_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="course_name" id="course_name" placeholder="Course Name" value="<?php if(isset($row['course_name'])) {echo $row['course_name'];} ?>">
        </div>
        <div class="form-group">
            <textarea class="form-control" type="text" name="course_desc" id="course_desc" placeholder="Course Description">
                <?php if(isset($row['course_desc'])) {echo $row['course_desc'];} ?>
            </textarea>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="course_author" id="course_author" placeholder="Course Author" value="<?php if(isset($row['course_author'])) {echo $row['course_author'];} ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="course_duration" id="course_duration" placeholder="Course Duration" value="<?php if(isset($row['course_duration'])) {echo $row['course_duration'];} ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="course_original_price" id="course_original_price" placeholder="Course Original Price" value="<?php if(isset($row['course_original_price'])) {echo $row['course_original_price'];} ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="course_price" id="course_price" placeholder="Course Selling Price" value="<?php if(isset($row['course_price'])) {echo $row['course_price'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <img src="<?php if(isset($row['course_img'])) {echo $row['course_img'];} ?>" class="img-thumbnail" width="150px">
            <input class="form-control-file" type="file" name="course_img" id="course_img" placeholder="Course Image">
        </div>
        <div class="text-center">
            <?php
            if(isset($msg)){
                echo $msg;
            } 
            ?>
            <button class="btn btn-danger" type="submit" id="courseEditBtn" name="courseEditBtn">Save Changes</button>
            <a class="btn btn-primary" href="courses.php">Close</a>
        </div>
    </form>
    <?php } ?>
</div>


<!-- Include admininclude - footer.php -->
<?php
    include('admininclude/footer.php');
?>