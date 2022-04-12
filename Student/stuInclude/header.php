<?php
    // Session - dbConnection - Login Check
    if(!isset($_SESSION)){
        session_start();
    }
    
    include('../dbConnection.php');

    if(isset($_SESSION['is_login'])){
        $stuLogEmail = $_SESSION['stuLogEmail'];
    }
    else {
        echo "<script> location.href = '../index.php'; </script>";
    }

    // Fetching Student Data From Database
    if(isset($_SESSION['is_login'])){
        $stuLogEmail = $_SESSION['stuLogEmail'];
        $sql = "SELECT * FROM student WHERE stu_email = '$stuLogEmail' ";
        $result = $conn->query($sql);
        $rows = $result->num_rows;

        $row = $result->fetch_assoc();

        $stu_id = $row['stu_id'];
        $stu_name = $row['stu_name'];
        $stu_email = $row['stu_email'];
        $stu_pass = $row['stu_pass'];
        $stu_occ = $row['stu_occ'];
        $stu_img = $row['stu_img'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="2"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Google Font - Ubuntu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/studentstyle.css?v=<?php time();?>">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <title>Student Panel</title>
</head>
<body>


    <!-- Top Navbar Start -->
    <nav class="navbar fixed-top p-0 shadow" style="background: #dc3545;">
        <a class="navbar-brand col-sm-3 col-md-2 m-0" href="studentProfile.php">
            Elearning
            <small>Student Area</small>
        </a>
    </nav>
    <!-- Top Navbar End -->


    <!-- Main Content Start -->
    
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <!-- Sidebar Start -->
            <nav class="col-sm-3 col-md-2 bg-light py-5 d-print-none sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <img src="<?php echo $stu_img; ?>" alt="studentimage" class="img-tumb">
                        </li>
                        <li class="nav-item">
                            <a href="studentProfile.php" class="nav-link">
                                <i class="fa fa-user"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./myCourse.php" class="nav-link">
                                <i class="fa fa-book"></i> My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stuFeedback.php" class="nav-link">
                                <i class="fa fa-comments"></i> Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stuChangePass.php" class="nav-link">
                                <i class="fas fa-key"></i> Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <!-- Sidebar End -->

            <div class="col-sm-9 mt-5">