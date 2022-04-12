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
    <nav class="navbar fixed-top p-0 shadow bg-success">
        <a class="navbar-brand col-sm-3 col-md-2 m-0" href="studentProfile.php">
            Elearning
            <small>Student Area</small>
        </a>
    </nav>
    <!-- Top Navbar End -->


    <!-- Main Content Start -->
    
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <div class="col-md-4 bg-light">
                <?php
                    if(isset($_REQUEST['course_id'])){
                        $course_id = $_REQUEST['course_id'];
                        $sql = "SELECT course_name FROM course WHERE course_id = '$course_id' ";
                        $result = $conn->query($sql);  
                        $row = $result->fetch_assoc();  }            
                ?>
                <h3 class="text-center mt-5"><?php echo $row['course_name'] ?> Lessons</h3>
                <ul id="playlist" class="nav flex-column">

                    <?php
                    if(isset($_REQUEST['course_id'])){
                        $course_id = $_REQUEST['course_id'];
                        $sql = "SELECT * FROM lesson WHERE course_id = '$course_id' ";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                ?>

                    <li class="nav-item border-bottom py-3 ml-4" movieurl="<?php echo $row['lesson_link']; ?>" style="cursor:pointer;"><?php echo $row['lesson_name']; ?></li>
                    <?php
                    }
                            }
                        }
                    ?>
                </ul>
            </div>
            <div class="col">
                <video id="videoarea" class="w-75 mx-5 my-5" controls>
                    <source>../lessonvid/01.Introduction to Advance JavaScript (Hindi).mp4</source>
                </video>
                <video id="videoarea" class="w-75 mx-5 my-5" src="../lessonvid/01.Introduction to Advance JavaScript (Hindi).mp4" controls></video>
            </div>
    </div>


<!-- Main Content End -->


    <!-- Jquery , Popper and Bootstrap Javascript -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>   

    <!-- Font Awesome Javascript -->
    <script type="text/javascript" src="../js/all.min.js"></script>


    <!-- Admin AJAX Call JavaScript -->
    <script type="text/javascript" src="../js/adminajaxrequest.js"></script>

    <!-- Custom JavaScript -->
    <script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>