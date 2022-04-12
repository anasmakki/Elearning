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
?>

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <form action="" method="get" class="d-print-none">
                <div class="form-group mb-3">
                   <label for="course_id">Enter Course ID:</label>
                    <input type="text" class="form-control" name="course_id" id="course_id">
                </div>
                    <button class="btn btn-danger" type="submit" name="submit">Search</button>
            </form>
        </div>
    </div>


<?php
// Search Course ID - PHP Code
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    if(isset($_REQUEST['course_id']) && $_REQUEST['course_id'] == $row['course_id'] ){
        $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['course_id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row['course_id'] == $_REQUEST['course_id']){
            $_SESSION['course_id'] = $row['course_id'];
            $_SESSION['course_name'] = $row['course_name'];
            ?>

            <h3 class="bg-dark text-white mt-3 p-2">Course ID : <?php if(isset($row['course_id'])){echo $row['course_id']; } ?> Course Name : <?php if(isset($row['course_name'])){echo $row['course_name'] ; } ?> </h3>
            
        <?php }

    }
}

?>


<!-- Table For Lessons Start -->

<?php
    if(isset($_REQUEST['submit'])){
    $sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['course_id']}";
    $result = $conn->query($sql);
    $rows = $result->num_rows;
    if($rows > 0){
?>
<table class="table">
        <thead>
            <tr>
                <th scope="col">Lesson ID</th>
                <th scope="col">Lesson Name</th>
                <th scope="col">Lesson Link</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td scope="row"><?php echo $row['lesson_id']; ?></td>
                <td><?php echo $row['lesson_name']; ?></td>
                <td><?php echo $row['lesson_link']; ?></td>
                <td>

                    <form action="editLesson.php" method="POST" class="d-inline">
                    <input type="hidden" name="lesson_id" value='<?php echo $row["lesson_id"]; ?>'>
                    <button type="submit" class="btn btn-info mr-3" name="edit" value="edit">
                        <i class="fas fa-pen"></i>
                    </button>
                    </form> 

                    <form method="POST" class="d-inline">
                        <input type="hidden" name="lesson_id" value='<?php echo $row["lesson_id"]; ?>'>
                        <button type="submit" class="btn btn-danger" name="delete" value="delete">
                        <i class="far fa-trash-alt"></i>
                         </button>
                    </form>
                    
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } } 

    // Code For Delete PHP Start
        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM lesson WHERE lesson_id={$_REQUEST['lesson_id']}";
            if($conn->query($sql) == TRUE){
                echo "<meta http-equiv='refresh' content='0;URL=?deleted' />";
            }else {
                echo "Unable to delete";
            }
        }
    // Code For Delete PHP End


    ?>
<!-- Table For Lessons End -->


</div>
</div>

<!-- Add New Lesson btn Start-->
<?php if(isset($_SESSION['course_id'])){
    echo '<div>
        <a class="btn btn-danger box" href="addLesson.php">
            <i class="fas fa-plus fa-2x" aria-hidden="true"></i>
        </a>
    </div>';
} ?>
<!-- Add New Lesson btn End-->

</div>

<!-- Include admininclude - footer.php -->
<?php
    include('admininclude/footer.php');
?>