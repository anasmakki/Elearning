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

<div class="col-sm-9 mt-5 ml-5">
    <!-- table -->
    <p class="bg-dark text-white p-2">List of Courses</p>
    <?php
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        $rows = $result->num_rows;
        if($rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Course ID</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td scope="row"><?php echo $row['course_id']; ?></td>
                <td><?php echo $row['course_name']; ?></td>
                <td><?php echo $row['course_author']; ?></td>
                <td>

                    <form action="editCourse.php" method="POST" class="d-inline">
                    <input type="hidden" name="course_id" value='<?php echo $row["course_id"]; ?>'>
                    <button type="submit" class="btn btn-info mr-3" name="edit" value="edit">
                        <i class="fas fa-pen"></i>
                    </button>
                    </form> 

                    <form method="POST" class="d-inline">
                        <input type="hidden" name="course_id" value='<?php echo $row["course_id"]; ?>'>
                        <button type="submit" class="btn btn-danger" name="delete" value="delete">
                        <i class="far fa-trash-alt"></i>
                         </button>
                    </form>
                    
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php  } else {
        $msg = '<div class="alert alert-info text-center font-weight-bold" role="alert">No Record Found!</div>';
        echo $msg;
    }
    // PHP - Deleting Course Record
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM course WHERE course_id={$_REQUEST['course_id']}";
        if($conn->query($sql) == TRUE){
            echo "<meta http-equiv='refresh' content='0;URL=?deleted' />";
        }else {
            echo "Unable to delete";
        }
    }
    ?>
</div> 
</div>  <!-- Row Close from Header -->

<!-- Add New Course btn Start-->
<div>
    <a class="btn btn-danger box" href="addCourse.php">
        <i class="fas fa-plus fa-2x" aria-hidden="true"></i>
    </a>
</div>
<!-- Add New Course btn End-->
</div>  <!-- Container Close From Header -->


<!-- Include admininclude - footer.php -->
<?php
    include('admininclude/footer.php');
?>