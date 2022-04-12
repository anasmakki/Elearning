<!-- Header Start -->
<?php
include('./mainInclude/header.php');
?>
<!-- Header End -->

<!-- Course Page Banner Start -->
<div class="container-fluid">
    <div class="row">
        <img src="./images/coursebanner.jpg" style="height:200px; width:100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div>
<!-- Course Page Banner End -->

<!-- Main Content Start -->

<div class="container">
    <h2 class="text-center my-3">Payment Status</h2>
    <form action="" method="post">
        <div class="row form-group">

            <label for="paymentstatus" class="offset-sm-3 col-form-label">Order ID: </label>

            <div class="col">
                <input type="text" id="paymentstatus" class="form-control" placeholder="Order ID">
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary">View</button>
            </div>
        </div>
    </form>
</div>


<!-- Main Content End -->

<!-- Contact Us Start -->
<?php
include('./contactus.php');
?>
<!-- Contact Us End -->

<!-- Footer Start -->
<?php
include('./mainInclude/footer.php');
?>
<!-- Footer End -->