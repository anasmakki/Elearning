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
    <link rel="stylesheet" href="../css/adminstyle.css?v=<?php time();?>">





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <title>Admin Panel</title>
</head>
<body>


    <!-- Top Navbar Start -->
    <nav class="navbar fixed-top p-0 shadow" style="background: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 m-0" href="">
            Elearning
            <small>Admin Area</small>
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
                            <a href="adminDashboard.php" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="courses.php" class="nav-link">
                                <i class="fa fa-book"></i> Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lessons.php" class="nav-link">
                                <i class="fas fa-book-open"></i> Lessons
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="students.php" class="nav-link">
                                <i class="fas fa-users"></i> Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#sellreport.php" class="nav-link">
                                <i class="fas fa-poll"></i> Sell Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#payment.php" class="nav-link">
                                </i> <i class="fa fa-credit-card"></i> Payment Status
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="feedback.php" class="nav-link">
                                <i class="fa fa-comments"></i> Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminChangePass.php" class="nav-link">
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