<!-- Header Start -->
<?php
include('./mainInclude/header.php');
include('./dbConnection.php');
?>
<!-- Header End -->


<!-- Start Video Background -->

<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <source src="video/banvid1.mp4">
        </video>
        <div class="vid-overlay"></div>
        <div class="video-content text-center">
            <h1 class="my-content">Welcome To iSchool</h1>
            <p class="my-content">Learn and Implement</p>

            <?php
      if(isset($_SESSION['is_login'])){
        echo '<a href="Student/studentProfile.php" class="btn btn-primary mybtn" >My Profile</a>';
      } else {
        echo '<a href="#" class="btn btn-danger mybtn" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Get Started</a>';
      }
      ?>


        </div>
    </div>
</div>

<!-- End Video Background -->


<!-- Start Text Banner -->

<div class="container-fluid bg-danger txt-banner">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-3"></i> Life Time Access</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-dollar-sign    "></i></i> Money Back Gurantee</h5>
        </div>
    </div>
</div>

<!-- End Text Banner -->


<!-- Most Important Courses Start -->

<div class="container mt-5">
    <h1 class="text-center">Popular Courses</h1>
    <!-- 1st Card Deck Start -->
    <div class="card-group  mt-4">
        <?php

        $sql = "SELECT * FROM course LIMIT 3";
        $result = $conn->query($sql);
        $rows = $result->num_rows;
        while($row = $result->fetch_assoc()){
        $course_id = $row['course_id'];
        $course_name = $row['course_name'];
        $course_desc = $row['course_desc'];
        $course_original_price = $row['course_original_price'];
        $course_price = $row['course_price'];
        $course_img = $row['course_img'];

        ?>
        <!-- <a href="./coursedetails.php?course_id=<?php echo $course_id; ?>" class="btn"
            style="text-align:left; margin:0px; padding:0px;"> -->
        <div class="card">
            <img src="<?php echo str_replace('..', '.', $course_img); ?>" class="card-img-top mx-auto mt-5" alt="..."
                height="150px">
            <div class="card-body">
                <h3 class="card-title"><?php echo $course_name; ?></h3>
                <p class="card-text"><?php echo $course_desc; ?></p>
            </div>
            <div class="card-footer">
                <p class="card-text d-inline">Price: <small><del>Rs.
                            <?php echo $course_original_price ?></del></small> <span class="font-weight-bolder">Rs.
                        <?php echo $course_price ?></span>
                </p>
                <a href="./coursedetails.php?course_id= <?php echo $course_id; ?> "
                    class="btn btn-primary font-weigth-bolder float-right text-white">Enroll</a>
            </div>
        </div>
        <!-- </a> -->
        <?php } ?>

    </div>
    <!-- 2nd Card Deck Start -->
    <div class="card-group mt-4">

        <?php
      $sql = "SELECT * FROM course LIMIT 3, 3";
      $result = $conn->query($sql);
      $rows = $result->num_rows;
      while($row = $result->fetch_assoc()){
        $course_name = $row['course_name'];
        $course_id = $row['course_id'];
        $course_desc = $row['course_desc'];
        $course_original_price = $row['course_original_price'];
        $course_price = $row['course_price'];
        $course_img = $row['course_img'];

    ?>

        <div class="card">
            <img src="<?php echo str_replace('..', '.', $course_img); ?>" class="card-img-top mx-auto mt-5" alt="..."
                height="150px">
            <div class="card-body">
                <h5 class="card-title"><?php echo $course_name ?></h5>
                <p class="card-text"><?php echo $course_desc ?></p>
            </div>
            <div class="card-footer">
                <p class="card-text d-inline">Price: <small><del>Rs.
                            <?php echo $course_original_price ?></del></small> <span class="font-weight-bolder">Rs.
                        <?php echo $course_price ?></span>
                </p>
                <a href="./coursedetails.php?course_id= <?php echo $course_id; ?> "
                    class="btn btn-primary font-weigth-bolder float-right text-white">Enroll</a>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

<div class="text-center mt-3">
    <a href="./courses.php" class="btn btn-danger text-center">View All Courses</a>
</div>

<!-- Most Important Courses End -->


<!-- Contact Us Start -->
<?php
include('./contactus.php');
?>
<!-- Contact Us End -->


<!-- Testimonial Start -->
<h2 class="text-center mt-4 mb-4">Testimonials</h2>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">

        <?php
            $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
            $result = $conn->query($sql);
            $i = 0;
            while($result->fetch_assoc()){
                if($i == 0){
                    $activate = 'active';
                } else {
                    $activate = '';
                }
        ?>

        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $activate; ?>"></li>

        <?php $i++; } ?>


    </ol> <!-- Wrapper for carousel items -->
<div class="carousel-inner">

        <?php
    // Testimonial - PHP Code
      $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
      $result = $conn->query($sql);
      $rows = $result->num_rows;
      if($rows > 0){
          $i = 0;
     while($row = $result->fetch_assoc()){  
         if($i == 0){
             $activate = 'active';
         }else {
             $activate = '';
         }
      $stu_img = str_replace('..', '.', $row['stu_img']);
      $stu_name = $row['stu_name'];
      $stu_occ = $row['stu_occ'];
      $f_content = $row['f_content'];
      ?>


        <div class="item carousel-item <?php echo $activate; ?> ">
            <div class="img-box"><img src="<?php echo $stu_img; ?>" alt=""></div>
            <p class="testimonial"><?php echo $f_content; ?></p>
            <p class="overview"><b><?php echo $stu_name; ?></b><?php echo $stu_occ; ?> </p>
            <div class="star-rating"> </div>
        </div>

        <?php $i++; } } ?>

    </div> <!-- Carousel controls --> <a class="carousel-control left carousel-control-prev" href="#myCarousel"
        data-slide="prev"> <i class="fa fa-angle-left"></i> </a> <a class="carousel-control right carousel-control-next"
        href="#myCarousel" data-slide="next"> <i class="fa fa-angle-right"></i> </a>
</div>

<!-- Testimonial End -->

<!-- Social Follow Start -->
<div class="container-fluid bg-danger">
    <div class="row text-white text-center p-1">
        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-facebook-f"></i> Facebook</a>
        </div>

        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-twitter"></i> Twitter</a>
        </div>

        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-whatsapp"></i> Whatsapp</a>
        </div>

        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-instagram"></i> Instagram</a>
        </div>
    </div>
</div>
<!-- Social Follow End -->

<!-- About Us Start -->
<div class="container-fluid p-4" style="#E9ECEF">
    <div class="row text-center">
        <div class="col-sm">
            <h5>About US</h5>
            <p>iSchool provides universal access to the world's best education, parnering with top universities and
                organizations to offer courses online.</p>
        </div>

        <div class="col-sm">
            <h5>Catagories</h5>
            <a href="#" class="text-dark">Web Development</a><br>
            <a href="#" class="text-dark">Web Designing</a><br>
            <a href="#" class="text-dark">Andriod App Dev</a><br>
            <a href="#" class="text-dark">iOS Development</a><br>
            <a href="#" class="text-dark">Data Analysis</a><br>
        </div>

        <div class="col-sm">
            <h5>Contact US</h5>
            <p>iSchool, Near Novality Pul,
                Samanabad - 834005 <br>
                Phone: +923020006566 <br>
                www.ischool.com
            </p>
        </div>
    </div>
</div>
<!-- About Us End -->

<!-- Footer Start -->
<?php
include('./mainInclude/footer.php');
?>
<!-- Footer End -->