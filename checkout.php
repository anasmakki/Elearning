<?php

if(!isset($_SESSION)){
    session_start();
}
include('./dbConnection.php');
if(!isset($_SESSION['stuLogEmail'])){
    echo '<script> location.href = "loginorsignup.php";</script>';
}else {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Checkout Elearning</title>
</head>
<body>

<div class="container mt-5">
    <?php ?>
    <div class="row">
        <div class="col-sm-6 offset-3 jumbotron">
            <h3 class="mb-3 text-center">Welcome to Elearning Payment Page</h3>
            <div class="text-center alert alert-info">
                    <small>Please Don't Refresh This Page!</small>
            </div> 
            <form action="pgresponse.php" method="post">
                <div class="form-group mb-3 row">
                    <label for="order_id" class="col-sm-4 col-form-label">Order ID</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="order_id" tabindex="1" maxlength="20" size="20" name="order_id" autocomplete="off" value="<?php echo 'ORDS' .  rand(10000,999999) ?>" readonly>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="stu_email" class="col-sm-4 col-form-label">Student Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="stu_email" tabindex="1" maxlength="20" size="20" name="stu_email" autocomplete="off" value="<?php if(isset($_SESSION['stuLogEmail'])) {echo $_SESSION['stuLogEmail'];} ?>" readonly>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="amount" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                        <input type="text" name="" class="form-control" id="amount" tabindex="1" maxlength="20" size="20" name="amount" autocomplete="off" value="<?php if(isset($_SESSION['course_price'])) {echo $_SESSION['course_price'];} ?>" readonly>
                    </div>
                </div>

                <div class="form-group mb-3 text-center">
                    <input type="submit" name="checkout" class="btn btn-primary" value="Checkout">
    
                    <a href="./courses.php" class="btn btn-danger">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</div>

    
</body>
</html>


<?php
}

 ?>

