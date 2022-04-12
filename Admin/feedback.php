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
    <p class="bg-dark text-white p-2">Student Feedbacks</p>
    <?php
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);
        $rows = $result->num_rows;
        if($rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Feedback ID</th>
                <th scope="col">Feedback Content</th>
                <th scope="col">Student ID</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td scope="row"><?php echo $row['f_id']; ?></td>
                <td><?php echo $row['f_content']; ?></td>
                <td><?php echo $row['stu_id']; ?></td>
                <td>
                    <form method="POST" class="d-inline">
                        <input type="hidden" name="f_id" value='<?php echo $row["f_id"]; ?>'>
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
    // PHP - Deleting Feedback Record
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM feedback WHERE f_id={$_REQUEST['f_id']}";
        if($conn->query($sql) == TRUE){
            echo "<meta http-equiv='refresh' content='0;URL=?deleted' />";
        }else {
            echo "Unable to delete";
        }
    }
    ?>
</div> 
</div>  <!-- Row Close from Header -->
</div>  <!-- Container Close From Header -->




<!-- Include admininclude - footer.php -->
<?php
    include('admininclude/footer.php');
?>