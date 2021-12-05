<?php
require_once '../config.php';
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$output="";
if (empty($name) || empty($email) || empty($mobile) || empty($password)) {
  $output = '<div class="alert alert-danger">Error occured, try again</div>';
}else {
  $sql = "INSERT INTO registration (c_email,c_name,c_password,c_phone_no) VALUES (?,?,?,?)";
  $stmt = mysqli_prepare($link,$sql);
  mysqli_stmt_bind_param($stmt,'ssss',$param_username,$param_name,$param_password,$param_mobile);
  $param_username = $email;
  $param_name = $name;
  $param_password = $password;
  $param_mobile = $mobile;
  if (mysqli_stmt_execute($stmt))
  {
    $output = '<div class="alert alert-success">Signup Successful</div>';

  }else {
    $output = '<div class="alert alert-danger">Error Occured</div>';
  }
}
echo $output;
?>
