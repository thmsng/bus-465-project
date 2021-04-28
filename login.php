<?php
  require('header.php');

  if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost", "ttn25","2F6BNtjHUyPSwh6nFLx9", "club_reviews");
    $sql = "SELECT sfu_mail, password FROM users WHERE sfu_mail = '$email' AND password='$password'";
    #echo '<p>query:' . $sql . '</p>';
    $result = mysqli_query($conn,$sql);

    $count=mysqli_num_rows($result);
    // If the result matched $username and $password, the table row must be one row
    if($count == 1){
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header('Location: https://datalab3.bus.sfu.ca/ttn25/project/home.php');
        #echo '<p>Log in success</p>';
        echo '
        <div class="alert alert-warning alert-dismissible fade show position-fixed bottom-0 end-0 p-3" role="alert" style="position:relative;
       z-index:1000;">
          <strong>Nice</strong> You are logged in!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
    else {
      #echo '<p>Log in fail.</p>';
      echo '
      <div class="alert alert-warning alert-dismissible fade show position-fixed bottom-0 end-0 p-3" role="alert" style="position:relative;
     z-index:1000;">
        <strong>Oops</strong> Wrong email or password!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      ';
    }
  }
?>

<!--start of login -->
<form class="container text-center" id="login-container" action="" method="POST">
  <img src="logo3.png" class="mb-4" alt="logo" width="200" height="100">
  <h1 class="h3 mb-3 font-weight-normal">Log in</h1>

  <div class="form-floating">
    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="example@sfu.ca" required autofocus>
    <label for="inputEmail" class="sr-only">SFU email</label>
  </div>

  <div class="form-floating">
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
    <label for="inputPassword" class="sr-only">Password</label>
  </div>

  <div class="checkbox mb-3">
    <br>
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>

  <h6 class="my-3">Don't have an account? Sign up <a href="create-account.php">here</a></h6>
</form>

<!--end of login -->


<?php
  require('footer.php')
?>
