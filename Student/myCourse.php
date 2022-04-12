<!-- Stu Header Inlcude Start -->
<?php
if(!isset($_SESSION)){
    session_start();
}
include('stuInclude/header.php');
include('../dbConnection.php');
?>
<!-- Stu Header Inlcude End -->


<!-- Main Body Start -->
<div class="container">
    <div class="jumbotron">
        <h3 class="text-center mb-3 d-block bg-danger p-3 text-white">All Courses</h3>
        <div class="row">

            <?php 
            $stuLogEmail = $_SESSION['stuLogEmail'];
            $sql = "SELECT co.order_id, c.course_id, c.course_name, c.course_img, c.course_desc, c.course_duration, c.course_author, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON co.course_id = c.course_id WHERE co.stu_email='$stuLogEmail'";

            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                    $course_img = $row['course_img'];
                    $course_desc = $row['course_desc'];
                    $course_duration = $row['course_duration'];
                    $course_author = $row['course_author'];
                    $course_original_price = $row['course_original_price'];
                    $course_price = $row['course_price'];


            ?>

            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo $course_name ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-body">
                                    <img src="<?php echo $course_img ?>" alt="" class="card-img-top">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-title"><?php echo $course_desc ?></p>
                                    <small class="card-text text-muted">Duration : <?php echo $course_duration ?></small><br>
                                    <small class="card-text text-muted">Instructor : $course_author</small><br>
                                    <p><small>Price : <del>Rs. <?php echo $course_original_price ?></del> Rs.<b> <?php echo $course_price ?></b></small></p>
                                    <div class="card-footer">
                                        <a href="watchCourse.php?course_id=<?php echo $course_id; ?>" class="btn btn-danger" >Watch Lessons</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                } } ?>
        </div>
    </div>
</div>
<!-- Main Body End -->



<!-- Stu Footer Inlcude Start -->
<?php
include('stuInclude/footer.php');
?>
<!-- Stu Footer Inlcude End -->