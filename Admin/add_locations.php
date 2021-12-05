<?php
require_once 'header1.php';
include_once '../config.php';
$location_error=$court_error=$hour_error=$status_error="";
$location = $court = $hour = $s1 = $status = "";
if (isset($_POST['submit'])) {

  if (empty($_POST['location_name'])) {
    $location_error = "please enter location name";
  }else {
    $location= test_input($_POST['location_name']);
    $name_pattern='/^[a-zA-Z ]+$/';
    if (!preg_match($name_pattern,$location)) {
      $location_error ="please enter valid location name";
    }
  }
    //validate author
    if (empty($_POST['court_number'])) {
      $court_error = "please enter court number";
    }else {
      $court= test_input($_POST['court_number']);
      $court_pattern='/^[0-9]+$/';
      if (!preg_match($court_pattern,$court)) {
        $court_error ="please enter valid court number";
      }
    }
    //validate price
    if (empty($_POST['hours'])) {
      $hour_error = "please enter hours";
    }else {
      $hour= test_input($_POST['hours']);
      $hour_pattern='/^[0-9]+$/';
      if (!preg_match($hour_pattern,$hour)) {
        $hour_error ="please enter valid hours";
      }
    }
    //validate Category
    if (empty($_POST['status'])) {
      $status_error = "please enter status";
    }else {
      $s1= test_input($_POST['status']);
      $status_pattern='/^[a-zA-Z ]+$/';
      if (!preg_match($status_pattern,$s1)) {
        $status_error ="please enter valid status";
      }
    }


    if (empty($location_error) && empty($court_error) && empty($hour_error) && empty($status_error)) {
      $sql = "INSERT INTO location values('','$location','$court','$hour','$s1')";

      if (mysqli_query($link,$sql)) {
        $status = '<div class="alert alert-success">Location added successfully</div><script> window.setTimeout(function(){
            $(".alert").fadeTo(500,0).slideUp(500,function(){
              $(this).remove();
            })
          },1500);</script>';
      }else {
        $status = '<div class="alert alert-danger">Error occured</div><script>window.setTimeout(function(){
            $(".alert").fadeTo(500,0).slideUp(500,function(){
              $(this).remove();
            })
          },1500);</script>';
      }
    }
}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
 <div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-sm-3"> </div>
         <div class="col-sm-5">
           <br>
           <br>
           <h3>Provide below details</h3><br>
           <span><?php echo $status; ?></span>
           <form class="form" method="post" enctype="multipart/form-data">
             <div class="form-group">
               <label for="">Name of location</label>
               <input type="text" name="location_name" value="" class="form-control">
               <span class="text-danger"><?php echo $location_error; ?></span>
             </div>
             <div class="form-group">
               <label for="">Court No</label>
               <input type="text" name="court_number" value="" class="form-control">
               <span class="text-danger"><?php echo $court_error; ?></span>
             </div>
             <div class="form-group">
               <label for="">Booking Hours</label>
               <input type="text" name="hours" value="" class="form-control">
               <span class="text-danger"><?php echo $hour_error; ?></span>
             </div>
             <div class="form-group">
               <label for="">Booking Status</label>
               <input type="text" name="status" value="" class="form-control">
               <span class="text-danger"><?php echo $status_error; ?></span>
             </div>
             <div class="form-group">
               <input type="submit" name="submit" value="Add Location" class="btn btn-success" style="background:green;">
             </div>
      </form>
         </div>
           <div class="col-sm-4"> </div>
      </div>

    </div>
  </div>
</div>
 <?php
 require_once 'footer1.php';
  ?>
