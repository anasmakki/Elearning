<!-- Header Start -->
<?php
include('./mainInclude/header.php');
include('./dbConnection.php');
?>
<!-- Header End -->


<!-- Course Page Banner Start -->
<div class="container-fluid">
    <div class="row">
      <div class="col">
        <img src="./images/coursebanner.jpg" style="height:400px; width:100%; object-fit:cover ; box-shadow:10px;" />

      </div>
    </div>
</div>
<!-- Course Page Banner End -->

<!-- All Courses Start -->

<div class="container mt-5 mb-5">
  <h1 class="text-center">All Courses</h1>
  <div class="row mt-4">
    <?php
      $sql = "SELECT * FROM course";
      $result = $conn->query($sql);
      $rows = $result->num_rows;
      if($rows > 0){
        while($row = $result->fetch_assoc()){
          $course_id = $row['course_id'];
          $course_img = $row['course_img'];
          $course_name = $row['course_name'];
          $course_desc = $row['course_desc'];
          $course_original_price = $row['course_original_price'];
          $course_price = $row['course_price'];
    ?>
    <div class="col-sm-4 mb-4">
    <a href="./coursedetails.php?course_id=<?php echo $course_id; ?>" class="btn" style="text-align:left; margin:0px; padding:0px;">
      <div class="card">
        <img src="<?php echo str_replace('..', '.', $course_img); ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $course_name ?></h5>
          <p class="card-text"><?php echo $course_desc ?></p>
        </div>
        <div class="card-footer">
          <p class="card-text d-inline">Price: <small><del>Rs. <?php echo $course_original_price ?></del></small> <span class="font-weight-bolder">Rs. <?php echo $course_price ?></span>
          </p>
          <a href="./coursedetails.php?course_id=<?php echo $course_id; ?> " class="btn btn-primary font-weigth-bolder float-right text-white">Enroll</a>
        </div>
      </div>
    </a>
    </div>
 <?php }
      } ?>
  </div>
      
</div>

<!-- All Courses End -->


<!-- Footer Start -->
<?php
include('./mainInclude/footer.php');
?>
<!-- Footer End -->