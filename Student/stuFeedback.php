<!-- Stu Header Inlcude Start -->
<?php
include('stuInclude/header.php');
?>
<!-- Stu Header Inlcude End -->


<!-- Student Feedback - PHP Code Start -->
<?php
if(isset($_REQUEST['stuFeedbackBtn'])){
    // Checking Empty Field
    if($_REQUEST['f_content'] == ""){
        $msg = "<div class='alert alert-danger mt-2'>Please Write Somthing!</div>";
    } else {
        $stu_feedback = $_REQUEST['f_content'];
        $sql = "INSERT INTO feedback(f_content , stu_id) VALUES ('$stu_feedback', '$stu_id') ";
        $result = $conn->query($sql);
        if($result == TRUE){
            $msg = "<div class='alert alert-success mt-2'>Feedback Added Successfully!</div>";           
        } else {
            $msg = "<div class='alert alert-danger mt-2'>Please Try agian later!</div>";
        }
    }
}
?>
<!-- Student Feedback - PHP Code End -->


<div class="col-sm-6 mt-5 mx-auto jumbotron">
    <h3 class="text-center">Feedback Section</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <input class="form-control" type="text" name="stu_email" id="stu_email" value="<?php if(isset($stu_email)){echo $stu_email; } ?>" readonly>
        </div>

        <textarea name="f_content" id="f_content" class="form-control" row="2" placeholder="Enter Feedback"></textarea>
        
        <div class="text-center">
            <button class="btn btn-danger mt-2" type="submit" id="stuFeedbackBtn" name="stuFeedbackBtn">Submit</button>
            <?php 
            if(isset($msg)){echo $msg;}
            ?>
        </div>
    </form>
</div>



<!-- Stu Footer Inlcude Start -->
<?php
include('stuInclude/footer.php');
?>
<!-- Stu Footer Inlcude End -->