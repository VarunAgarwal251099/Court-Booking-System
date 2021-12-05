<?php
require_once 'header.php';
include_once '../config.php';
 ?>
 <div class="container">
       <h2 class="h2">Welcome To</h2>
       <h1 class="h1">Court Booking System</h1>
       <div class="button">
         <a href="book_court.php" class="btn1">Book Court</a>
 </div>
</div>
</div>
<div class="modal" id="LoginModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login to Paddle Sport</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <span id="help" class="text-danger"></span>
        <form class="" action="" method="post">
          <div class="form-group">
            <i class="fa fa-envelope"></i><label for="">&nbsp;Email</label>
            <input type="text" name="username" id="username" value="" class="form-control" placeholder="Enter email">
          <!--  <span class="text-danger"><?php echo $username_err ?></span> -->
          </div>
          <div class="form-group">
            <i class="fa fa-key"></i><label for="">&nbsp;Password</label>
            <input type="password" name="password" id="password" value="" class="form-control" placeholder="Enter password" >
          <!--  <span class="text-danger"><?php echo $password_err ?></span> -->
          </div>
          <div class="form-group">
            <button type="button" id="login" name="submit" value="Login" class="btn btn-success" style="width: 100%;background: green;">Login</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <h6>New to The Paddler Sport? <a href="signup.php">Join now</a><h6>
      </div>
    </div>
  </div>
</div>
 <?php
 require_once 'footer.php';
  ?>
