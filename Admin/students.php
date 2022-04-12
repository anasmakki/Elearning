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
    <p class="bg-dark text-white p-2">List of Students</p>
    <?php
        $sql = "SELECT * FROM student";
        $result = $conn->query($sql);
        $rows = $result->num_rows;
        if($rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td scope="row"><?php echo $row['stu_id']; ?></td>
                <td><?php echo $row['stu_name']; ?></td>
                <td><?php echo $row['stu_email']; ?></td>
                <td>

                    <form action="editStudent.php" method="POST" class="d-inline">
                    <input type="hidden" name="stu_id" value='<?php echo $row["stu_id"]; ?>'>
                    <button type="submit" class="btn btn-info btn-sm" name="edit" value="edit">
                        <i class="fas fa-pen"></i>
                    </button>
                    </form> 

                    <form method="POST" class="d-inline">
                        <input type="hidden" name="stu_id" value='<?php echo $row["stu_id"]; ?>'>
                        <button type="submit" class="btn btn-danger btn-sm" name="delete" value="delete">
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
    // PHP - Deleting Student Record
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM student WHERE stu_id={$_REQUEST['stu_id']}";
        if($conn->query($sql) == TRUE){
            echo "<meta http-equiv='refresh' content='0;URL=?deleted' />";
        }else {
            echo "Unable to delete";
        }
    }
    ?>
</div> 
</div>  <!-- Row Close from Header -->

<!-- Add New Student btn Start-->
<div>
    <a class="btn btn-danger box" href="addStudent.php">
        <i class="fas fa-plus fa-2x" aria-hidden="true"></i>
    </a>
</div>
<!-- Add New Student btn End-->
</div>  <!-- Container Close From Header -->


<!-- Include admininclude - footer.php -->
<?php
    include('admininclude/footer.php');
?>