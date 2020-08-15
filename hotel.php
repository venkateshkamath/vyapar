<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../indonesia_hackathon-master/starrr.css">
  <link rel="stylesheet" href="home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../indonesia_hackathon-master/starrr.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title></title>
  </head>
  <body style="background-color:#A4B0BD;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="font-family: 'Lato', sans-serif;">
  <a class="navbar-brand" href="home.php" style="font-size:2rem;">VYAPAR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
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

    <div class="conatiner">
      <!--<div class="row">
        <div class="col-sm-12">
        <div class="card">
          <h3>HOTEL NAME:'.$row['name'].'</h3>
        </div>

        </div>

      </div> -->
<?php
      require './php/server.php';
$sql = mysqli_query($conn, "SELECT * from shop WHERE type='Hotels'");
$num = mysqli_num_rows($sql);
if($num > 0){
  while($row = mysqli_fetch_assoc($sql)){
    $id = $row['Id'];
    echo '
    <div class="container">
    <br>
    <div class="card" id="card">
    <div class="row">
      <div class="col-sm-12">
        <h3>'.$row['Name'].'</h3>
      </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <img  id="image" src="./profile/'.$row['image'].'"/>
        </div>
        </div>
        <br>
      <div class="row">
        <div class="col-sm-12" style="text-align:center;">
          <h5>DESCRIPTION: '.$row['description'].'</h5>
          <h5>TYPE OF BUSSINESS: '.$row['type'].'</h5>
        </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
          <a href="index2.php?id='.$id.'"><button type="submit" class="btn btn-primary" name="view" style="display:block;margin-left:auto;margin-right:auto;" >View more</button></a>
          
          </div>
          </div>
          <br>
      </div>
      </div>';
  }
}
       ?>

    </div>
    
  </body>
</html>
