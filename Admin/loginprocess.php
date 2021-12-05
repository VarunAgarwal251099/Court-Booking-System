<?php
session_start();
include_once '../config.php';
$username=$_POST['username'];
$password = $_POST['password'];
if(isset($username) && isset($password))
{

  $sql = "SELECT * FROM admin WHERE email = '$username' and pass='$password'";
  $result = mysqli_query($link,$sql);
  if (mysqli_num_rows($result)>0) {
    $_SESSION['loggedin'] = true;
    echo 1;
    /*while ($row = mysqli_fetch_array($result)) {
      if (password_verify($password,$row['pass'])) {
        $_SESSION['loggedin'] = true;
        //$_SESSION['id'] = $row['id'];
      //  $_SESSION['id'] = $row['c_email'];
    //    $_SESSION['name'] = $row['c_name'];
        echo 1;
      }else {
        echo 0;
      }
    }*/

  }else {
    echo 0;
  }
}
 ?>
