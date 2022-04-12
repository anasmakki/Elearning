<!-- Footer Start -->
<footer class="container-fluid bg-dark text-center text-white p-2">
  <small>Copyright &copy; 2022 || Designed by Anas Makki || <a href="#" data-bs-toggle="modal" data-bs-target="#adminLoginModalCenter" style="color:white;">Admin Login</a> </small>
</footer>
<!-- Footer End -->

<!-- Student Signup Modal Start -->

<!-- Modal -->
<div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Registration Form Start -->
          <?php include('studentRegistration.php') ?>
        <!-- Registration Form End -->
      </div>
      <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="button" id="signup" class="btn btn-primary" onclick="addStu();">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Student Signup Modal End -->



<!-- Student Login Modal Start -->

<!-- Modal -->
<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Login Form Start -->
        <form id="stuLoginForm">
        <div class="mb-3">
          <i class="fas fa-envelope"></i><label for="stuemail" class="form-label font-weight-bold ml-1">Email</label>
          <input type="email" class="form-control" id="stulogemail" name="stulogemail" placeholder="Email">
        </div>

        <div class="mb-3">
          <i class="fas fa-key"></i><label for="stupass" class="form-label font-weight-bold ml-1">Password</label>
          <input type="password" class="form-control" id="stulogpass" name="stulogpass" placeholder="Password">
        </div>
        </form>


        <!-- Login Form End -->
      </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
        <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin();">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Student Login Modal End -->



<!-- Admin Login Modal Start -->

<!-- Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Admin Login Form Start -->
        <form id="adminLoginForm">
        <div class="mb-3">
          <i class="fas fa-envelope"></i><label for="adminemail" class="form-label font-weight-bold ml-1">Email</label>
          <input type="email" class="form-control" id="adminlogemail" name="adminlogemail" placeholder="Email">
        </div>

        <div class="mb-3">
          <i class="fas fa-key"></i><label for="adminpass" class="form-label font-weight-bold ml-1">Password</label>
          <input type="password" class="form-control" id="adminlogpass" name="adminlogpass" placeholder="Password">
        </div>
        </form>


        <!-- Admin Login Form End -->
      </div>
      <div class="modal-footer">
        <small id="statusAdminLogMsg"></small>
        <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin();">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Admin Login Modal End -->

<!-- Jquery , Popper and Bootstrap Javascript -->
<!-- <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>    -->

<!-- Bootstrap and Popper -->
<script src="js/bootstrap.min.js"></script>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Font Awesome Javascript -->
<script type="text/javascript" src="js/all.min.js"></script>


<!-- Student AJAX Call JavaScript -->
<script type="text/javascript" src="js/ajaxrequest.js"></script>

<!-- Admin AJAX Call JavaScript -->
<script type="text/javascript" src="js/adminajaxrequest.js"></script>
</body>
</html>