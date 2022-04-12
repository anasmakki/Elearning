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

<div class="container mt-5 mb-5 jumbotron">
    <div class="row">
        <div class="col-sm-6">
            <h3>Login</h3>
            <!-- Sign in Start -->
            <form id="stuLoginForm">
                    <div class="mb-3">
                      <i class="fas fa-envelope"></i><label for="stuemail" class="form-label font-weight-bold ml-1">Email</label>
                      <input type="email" class="form-control" id="stulogemail" name="stulogemail" placeholder="Email">
                    </div>
            
                    <div class="mb-3">
                      <i class="fas fa-key"></i><label for="stupass" class="form-label font-weight-bold ml-1">Password</label>
                      <input type="password" class="form-control" id="stulogpass" name="stulogpass" placeholder="Password">
                    </div>
                    <input type="hidden" name="" id="goto_checkout" value="goto_checkout">
                    <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin();">Login</button>
                    </form>
            <!-- Sign in End -->
        </div>
    
    
        <div class="col-sm-6">
            <h3>Sign Up</h3>
            <!-- Sign up Start -->
            <form id="stuRegForm">
            <div class="mb-3">
                <i class="fas fa-user"></i><label for="stuname" class="form-label font-weight-bold ml-1">Name</label> 
                <input type="text" class="form-control" id="stuname" name="stuname" placeholder="Name"><small id="errorMsg1"></small>
            </div>
            
            <div class="mb-3">
                <i class="fas fa-envelope"></i><label for="stuemail" class="form-label font-weight-bold ml-1">Email</label>
                <input type="email" class="form-control" id="stuemail" name="stuemail" placeholder="Email">
                <small id="errorMsg2"></small>
                <small class="form-text">We'll never share your email with anyone else. </small>
            </div>
            
            <div class="mb-3">
                <i class="fas fa-key"></i><label for="stupass" class="form-label font-weight-bold ml-1">New Password</label>
                <input type="password" class="form-control" id="stupass" name="stupass" placeholder="New Password"><small id="errorMsg3"></small>
            </div>
            <button type="button" id="signup" class="btn btn-primary" onclick="addStu();">Sign Up</button>
            <span id="successMsg"></span>
            </form>
            <!-- Sign up End -->
        </div>
    
    </div>
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