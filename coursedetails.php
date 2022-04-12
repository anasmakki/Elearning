<!-- Header Start -->
<?php
include('./mainInclude/header.php');
include('./dbConnection.php');
?>
<!-- Header End -->

<!-- Course Page Banner Start -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./images/coursebanner.jpg" style="height:200px; width:100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div>
<!-- Course Page Banner End -->

<!-- Main Content Start -->
<div class="container mt-5">
    
    <?php
        $course_id = $_REQUEST['course_id'];
        $_SESSION['course_id'] = $course_id;
        $sql = "SELECT * FROM course WHERE course_id = '$course_id' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        $course_img = str_replace('..', '.', $row['course_img']);
        $course_name = $row['course_name'];
        $course_desc = $row['course_desc'];
        $course_duration = $row['course_duration'];
        $course_original_price = $row['course_original_price'];
        $course_price = $row['course_price'];
        $_SESSION['course_price'] = $course_price;
    ?>

    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo $course_img; ?>" class="card-img-top" alt="Python">
        </div>

        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    Course Name: <?php echo $course_name; ?>
                </h5>
                <p class="card-text">
                    Description: <?php echo $course_desc; ?>
                </p>
                <p class="card-text">
                    Duration: <?php echo $course_duration; ?>
                </p>

                <form action="checkout.php" method="post">
                    <p class="card-text d-inline">
                        Price: <small><del>Rs. <?php echo $course_original_price; ?></del></small> <span class="font-weight-bolder">Rs. <?php echo $course_price; ?></span>
                    </p>
                    <input type="hidden" name="course_price" value="<?php echo $course_price ?>">
                    <button type="submit" class="btn btn-primary font-weight-bolder text-white float-right" name="buy">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Lessons Section -->
<div class="container">

    <?php
    $sql = "SELECT lesson_name FROM lesson WHERE course_id = '$course_id'";
    $result = $conn->query($sql);
    $rows = $result->num_rows;
    if($rows > 0){
        $i = 1;
    ?>

    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Lesson No.</th>
                    <th scope="col">Lesson Name.</th>
                </tr>
            </thead>

            <tbody>
                <?php
                        while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $row['lesson_name'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
<?php     
    } else {
        $msg =  "<div class='alert alert-info mt-5 text-center'>LESSONS WILL BE UPLOADED SOON, KEEP IN TOUCH! </div>";
        echo $msg;
    } ?>

</div>


<!-- Main Content End -->


<!-- Footer Start -->
<?php
include('./mainInclude/footer.php');
?>
<!-- Footer End -->