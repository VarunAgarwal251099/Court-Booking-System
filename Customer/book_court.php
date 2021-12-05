<?php
require_once '../config.php';
require_once 'header.php';
//require_once 'logincheck.php';
$output ="";
if (isset($_POST['bookcourt'])) {
  $_SESSION['update'] = $_POST['book_court'];
  echo "<script>
      window.location.href = 'checkout.php';
  </script>";
}
if (isset($_POST['q'])) {
  $loc_name = test_input($_POST['location_name']);
  $sql= "SELECT * FROM location WHERE loc LIKE '%$loc_name%'";

  $result = mysqli_query($link,$sql);
  if (mysqli_num_rows($result)>0)
  {
    $output .= '<table class="table">
      <tr>
        <th>Location</th>
        <th>Court No.</th>
        <th>Booking Hours</th>
        <th>Booking Status</th>
        <th></th>
      </tr>';
    while ($row = mysqli_fetch_array($result)) {

      $output .= '
        <tr>
          <td>'.$row['loc'].'</td>
          <td>'.$row['court'].'</td>
          <td>'.$row['booking_hours'].'</td>
          <td>'.$row['booking_status'].'</td>
          <td>
          <form method="post">
          <input type="hidden" name="book_court" value="'.$row['id'].'">
          <button type ="submit" class="btn btn-outline-success my-2 my-sm-0" name="bookcourt">Book Court</button>
          </form>
          </td>
        </tr>';

    }
    $output .='</table>';

  }else {
    $output = '<div class="alert alert-danger">No location found</div>';
  }
}

if (isset($_POST['all'])) {
  $sql="SELECT * FROM location";
  $result = mysqli_query($link,$sql);
  if (mysqli_num_rows($result)>0)
  {
    $output .= '<table class="table">
      <tr>
      <th>Location</th>
      <th>Court No.</th>
      <th>Booking Hours</th>
      <th>Booking Status</th>
      <th></th>
      </tr>';
    while ($row = mysqli_fetch_array($result)) {

      $output .= '
        <tr>
        <td>'.$row['loc'].'</td>
        <td>'.$row['court'].'</td>
        <td>'.$row['booking_hours'].'</td>
        <td>'.$row['booking_status'].'</td>
        <td>
        <form method="post">
        <input type="hidden" name="book_court" value="'.$row['id'].'">
        <button type ="submit" class="btn btn-outline-success my-2 my-sm-0" name="bookcourt">Book Court</button>
        </form>
        </td>
        </tr>';
    }
    $output .='</table>';

  }else {
    $output = '<div class="alert alert-danger">No Location found</div>';
  }

}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
 <div>
 <div class="container">
   <div class="row">
     <div class="col-lg-2">
     </div>
     <div class="col-lg-12">
       <br>
       <form class="form-inline" method="post">
    <input class="form-control mr-sm-2" name="location_name" type="text" placeholder="Enter location name" aria-label="Search">
    <input class="btn btn-outline-success my-2 my-sm-0" name="q" type="submit" value="Search"> &nbsp;&nbsp;
    <button class="btn btn-outline-success my-2 my-sm-0" name="all" type="submit">View All</button>
  </form>
  <br><br>
      <?php echo $output; ?>
     </div>
   </div>
 </div>
</div>
 <?php
 require_once 'footer.php';
  ?>
