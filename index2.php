<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title></title>
  </head>
  <style>
  #image{
    width:150px;
    height: 150px;
    display: block;
    box-shadow: 0 10px 10px 0 black,0 -5px 10px 0 black;
      margin-left: auto;
      margin-right: auto;
  }

  #card{
    margin-top: 70px;
      border-radius: 25px;
    text-align:center;  
    background-color: wheat;
      line-height: 30px;
      border:2px solid black;
font-family: 'Montserrat', sans-serif;
  }
  </style>
  <body style="background-color:#DAE0E2;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-family: 'Lato', sans-serif;">
  <a class="navbar-brand" href="index.php" style="font-size:2rem;">VYAPAR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="hotel.php">Hotels</a>
          <a class="dropdown-item" href="groceries.php">Grocery</a>
    </div>
  </li>
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
    <?php
    $id = $_GET['id'];
          require './php/server.php';
    $sql = mysqli_query($conn, "SELECT * from shop WHERE Id='$id'");
    $num = mysqli_num_rows($sql);
    if($num > 0){
      while($row = mysqli_fetch_assoc($sql)){
        echo '
        <div class="container">
        <div  id="card" style="background-color:#A4B0BD;"><br>
        <div class="row">
          <div class="col-sm-12">
            <h3> <span style="font-weight:bold;"> NAME: </span>'.$row['Name'].'</h3>
          </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12">
              <img style="text-align:center;" id="image" src="./profile/'.$row['image'].'"/>
            </div>
            </div>
            <br>
          <div class="row">
            <div class="col-sm-12">
              <h3><span style="font-weight:bold;">PHONE NO: </span>'.$row['phone'].'</h3>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
              <h3><span style="font-weight:bold;">ADDRESS: </span>'.$row['Address'].'</h3>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
              <h3><span style="font-weight:bold;">EMAIL: </span>'.$row['Email'].'</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <h3><span style="font-weight:bold;">DESCRIPTION: </span>'.$row['description'].'</h3>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
              <h3><span style="font-weight:bold;">TYPE OF BUSINESS: </span>'.$row['type'].'</h3>
            </div>
            </div> <br>
          </div>
          </div>';
      }
    }
           ?>
  </body>
</html>
