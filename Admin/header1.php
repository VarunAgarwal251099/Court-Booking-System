<?php session_start(); ?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Paddle Sport</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
<style>
p{
  margin: 0;
  padding: 0;
}
body{
  display: flex;
  flex-direction: column;
  height: 100vh;
}
nav{
  background: green;
  box-shadow: 0 5px 10px black;
}
.navbar-brand{
  font-size: 50px;
  font-weight: bold;
  color: white;
  text-decoration: none;
  padding: 0 55px;
}
.navbar-brand:hover{
  color: white
}
nav ul li{
  padding: 7px 16px;
}
nav ul li a{
  font-size: 18px;
  color: white;
  text-transform: uppercase;
  text-align: center;
}
nav ul li a:hover{
  background: #000066;
  border-radius: 4px;
  color: white;
  transition: 0.5s;
}
.navbar-toggler{
  margin-right: 15px;
}
.navbar-toggler-icon{
  background: white;
  border-radius: 50%;
}
.h2{
  font-size: 60px;
  font-weight: 700;
  margin-top: 120px;
  text-align: center;
  color: #fff;
}
.h1{
  font-size: 80px;
  font-weight: 900;
  text-align: center;
  color: #fff;
}
.h1,.h2{
  color: green;
}
.button{
    display:flex;
    justify-content: center;
    align-items: center;
}
.btn1{
  padding: 12px 36px;
  margin: 10px;
  color: #fff;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 20px;
  border-top-left-radius: 20px;
  border-bottom-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px;
  background: green;
}

.btn1:hover{
  background: grey;
  text-decoration: none;
  color:white;
}
.footer{
  width: 100vw;
  height: 50px;
  background: green;
  margin-top: auto;
}
.footer p{
  color: #fff;
  font-size: 21px;
  text-align: center;
  line-height: 50px;
}

</style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="#">CBS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <?php
    if (isset($_SESSION['loggedin'])) {
    echo '
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="login.php"><i class="fas fa-home"></i> Home</a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

  }else {
    echo '<li class="nav-item active">
      <a class="nav-link login" href="login.php">login<span class="sr-only">(current)</span></a>
    </li>';
  }


     ?>

      </ul>
    </div>
  </nav>
