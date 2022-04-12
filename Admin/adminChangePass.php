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

<?php 
// Change Password - PHP Code
if(isset($_POST['changePassword'])){
    // Checking Empty Field
    if($_POST['admin_pass'] == ""){
        $msg = "<div class='alert alert-danger mt-2'>Password Can't be blank!</div>";
    } else {
        $admin_pass = $_POST['admin_pass'];
        $sql = "UPDATE admin SET admin_pass = '$admin_pass' WHERE admin_email = '$adminEmail'";
        $result = $conn->query($sql);
        if($result == TRUE){
            $msg = "<div class='alert alert-success mt-2'>Password Changed Successfully!</div>";           
        } else {
            $msg = "<div class='alert alert-danger mt-2'>Password Not Change! Please try again later</div>";
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-auto jumbotron">
    <h3 class="text-center">Change Admin Password</h3>
    <?php 
    // Fetching Data to form
    $sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control" type="text" name="admin_email" id="admin_email" value="<?php if(isset($row['admin_email'])){echo $row['admin_email']; } ?>" readonly>
        </div>

        <div class="form-group">
            <input class="form-control" placeholder="Enter New Password" type="text" name="admin_pass" id="admin_pass">
        </div>
        
        <div class="text-center">
            <button class="btn btn-danger" type="submit" id="changePassword" name="changePassword">Change Password</button>
            <?php 
            if(isset($msg)){echo $msg;}
            ?>
        </div>
    </form>
</div>


<!-- Include admininclude - footer.php -->
<?php
    include('admininclude/footer.php');
?>