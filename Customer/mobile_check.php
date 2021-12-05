<?php
require_once '../config.php';
$mobile = $_POST['mobile'];
$output="";
if (empty($mobile)) {
  $output = '<div class="alert alert-danger">Error occured, try again</div>';
}else {
  $sql = "SELECT * FROM registration WHERE c_phone_no = '$mobile'";
  $result = mysqli_query($link,$sql);
  if (mysqli_num_rows($result)>0)
  {
    $output = 1;
  }else {
    $output = 0;
  }
}
echo $output;
?>
