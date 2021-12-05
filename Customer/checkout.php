<?php
require_once 'header.php';
include_once '../config.php';
$status='';
if(isset($_POST['submit'])){
  $id=$_SESSION['update'];
  $s1="Booked";
  $sql = "UPDATE location SET booking_status = '$s1' WHERE id = '$id'";
  $res=mysqli_query($link,$sql);
  if ($res) {
    $status = '<div class="alert alert-success">Location Booked successfully</div><script> window.setTimeout(function(){
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
?>
<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <span id="help"></span>
      <br>
      <span><?php echo $status; ?></span>
      <br>
      <h4>Book Court</h4>
      <br>
      <form class="" action="" method="post">
        <div class="form-group">
          <i class="fa fa-user"></i><label for="">&nbsp;Name</label>
          <input type="text" name="name" value="" id="name" class="form-control" placeholder="Enter full name" >
          <span id="name-help"></span>
        </div>
        <div class="form-group">
          <i class="fas fa-mobile-alt"></i><label for="">&nbsp;Mobile</label>
          <input type="text" name="mobile" value="" id="mobile" class="form-control" placeholder="Enter Mobile number" >
          <span id="mob-help"></span>
        </div>
        <div class="form-group">
          <i class="fas fa-dollar"></i><label for="">&nbsp;Price</label>
          <input type="text" name="price" value="500" id="price" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" value="Pay" class="btn btn-success" style="background: linear-gradient(to right, #000066 0%, #3366ff 100%);">
        </div>
      </form>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
<?php
require_once 'footer.php';
 ?>
