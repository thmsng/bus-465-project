<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!--boostrap tagsinput-->
  <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

  <title>Let's scout clubs!!</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <?php
  session_start();
    //connect to db:
    $conn = mysqli_connect("localhost", "ttn25","2F6BNtjHUyPSwh6nFLx9", "club_reviews");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    };


  ?>

  <!--header-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <!--logo -->
    <a class="navbar-brand" href="home.php">
      <img src="logo3.png" width="80" height="40" class="d-inline-block align-top" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <!-- menu / navigation bar -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">List of clubs</a>
        </li>

        <!-- login / sign up drop down -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Account
          </a>
          <!--start of login nav function-->
          <div class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">

            <?php
              if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                echo '
                <!-- else -->
                <a class="dropdown-item" href="account.php">My Account</a>
                <a class="dropdown-item" href="logout.php">Log out</a>
                </div>';
              } else {echo '<!--if(!empty($_SESSION["userId"])) -->
              <a class="dropdown-item" href="login.php">Login</a>
              <a class="dropdown-item" href="create-account.php">Create Account</a>';
              }

            ?>


          <!--end of login nav function-->
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">FAQ</a>
        </li>
      </ul>
    </div>

  </nav>
