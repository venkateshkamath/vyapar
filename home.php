<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
   
   <style>
html{
min-height: 100%;
background-attachment: fixed;
background: url('../indonesia_hackathon-master/assets/images/back.jpg') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  justify-content: center;
 }

</style>
    <title>VYAPAR | Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-family: 'Lato', sans-serif;">
  <a class="navbar-brand" href="home.php" style="font-size:2rem;">VYAPAR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-auto">
<!--
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
-->
      <?php
      if(isset($_SESSION['userID']))
      {
        echo '
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="hotel.php">Hotels</a>
          <a class="dropdown-item" href="groceries.php">Grocery</a>
    </div>
  </li>';
}
 ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php
          if(isset($_SESSION['userID']))
          {
            echo $_SESSION['userName'];
          }
          else {
        echo 'LOGIN/SIGNUP';
          }
           ?>

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
          if(isset($_SESSION['userID']))
          {
            echo '<a class="dropdown-item" href="php/logout.php">LOGOUT</a>';
        }
      else{

        echo '
      <a class="dropdown-item" href="login_main.php">LOGIN</a>
      <a class="dropdown-item" href="register_main.php">REGISTER</a>';
      }
      ?>
      </li>
    </ul>
  </div>
</nav>

