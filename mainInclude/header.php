<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Google Font - Ubuntu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!-- Testimonial CSS -->
    <link rel="stylesheet" href="css/testimonial.css?v=<?php time();?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css?v=<?php time();?>">

    <title>iSchool</title>

</head>
<body>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top pl-5">
  <div class="container-fluid ">
    <a class="navbar-brand" href="index.php">iSchool</a>
    <span class="navbar-text">Learn and Implement</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav custom-nav pl-5">
        <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
        <li class="nav-item custom-nav-item"><a href="./paymentstatus.php" class="nav-link">Payment</a></li>

        <?php
        session_start();
        if(isset($_SESSION['is_login'])){
          echo '<li class="nav-item custom-nav-item"><a href="Student/studentProfile.php" class="nav-link">My Profile</a></li>
          <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
        }
        else {
          echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuLoginModalCenter">Login</a></li>
          <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Signup</a></li>';
        }
        ?>

        <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar End -->