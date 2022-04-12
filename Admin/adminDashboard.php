<!-- Include admininclude - header.php -->
<?php
    if(!isset($_SESSION)){
        session_start();
    }

    include('admininclude/header.php');

    if(isset($_SESSION['is_admin_login'])){
        $adminEmail = $_SESSION['adminLogEmail'];
    }
    else {
        echo "<script> location.href = '../index.php'; </script>";
    }
?>
<!-- Body Start -->
<div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width:18rem">
                <h5 class="card-header">
                    Courses
                </h5>
                <div class="card-body">
                    <h4 class="card-title">
                        5
                    </h4>
                    <a class="btn text-white" href="">View</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width:18rem">
                <h5 class="card-header">
                    Students
                </h5>
                <div class="card-body">
                    <h4 class="card-title">
                        25
                    </h4>
                    <a class="btn text-white" href="">View</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width:18rem">
                <h5 class="card-header">
                    Sold
                </h5>
                <div class="card-body">
                    <h4 class="card-title">
                        335
                    </h4>
                    <a class="btn text-white" href="">View</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-5 mt-5 text-center">
        <!-- Table -->
        <p class="bg-dark text-white p-2 font-weight-bold">Courses Ordered</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead> 
            <tbody>
                <tr>
                    <td scope="row">22</td>
                    <td>100</td>
                    <td>anas@gmail.com</td>
                    <td>20/10/2020</td>
                    <td>2000</td>
                    <td>
                        <button class="btn btn-danger" type="submit" name="delete" value="Delete"><i class="far fa-trash-alt" aria-hidden="true"></i></i></button>
                    </td>
                </tr>
            </tbody>                      
        </table>
    </div>

</div>
<!-- Body End -->

</div>
</div>

<!-- Main Content End -->

<!-- Include admininclude - footer.php -->
<?php
    include('admininclude/footer.php');
?>