<?php
  require('header.php')
?>

<div class="container justify-content-center" style="min-height: 80vh;">
  <h1 class="text-center">Created account successfully!</h1>
  <br>

  <?php
    //storing account data from create-account.php
    $first_name =  $_REQUEST['first_name'];
    $last_name =  $_REQUEST['last_name'];
    $sfu_mail =  $_REQUEST['sfu_mail'];
    $password =  $_REQUEST['password'];
    $concentration =  $_REQUEST['concentration'];
    $creation_date = date('Y-m-d');
    $password_hided = str_repeat("*",strlen($password));

    $sql = "INSERT INTO users (first_name, last_name, sfu_mail, password, concentration, verified, club_admin,creation_date) VALUES ('$first_name','$last_name','$sfu_mail','$password','$concentration',0,0,'$creation_date')";

      if(mysqli_query($conn, $sql)){
          echo '
          <div class="alert alert-warning alert-dismissible fade show position-fixed bottom-0 end-0 p-3" role="alert" style="position:relative;
         z-index:1000;">
            <strong>Huh??! Hmm...</strong> Did you send something to our server? &nbsp &nbsp &nbsp
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          ';

          echo
          '<div class="container" style="width: 50%; min-width: 430px;">
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Account info:</h4>
              <hr>
              <div class="row">
                <p class="mb-0 col-4">First name: </p>
                <p class="mb-0 col-auto">' . $first_name . '</p>
              </div>
              <div class="row">
                <p class="mb-0 col-4">Last name: </p>
                <p class="mb-0 col-auto">' . $last_name . '</p>
              </div>
              <div class="row">
                <p class="mb-0 col-4">SFU mail: </p>
                <p class="mb-0 col-auto">' . $sfu_mail . '</p>
              </div>
              <div class="row">
                <p class="mb-0 col-4">Password: </p>
                <p class="mb-0 col-auto">' . $password_hided . '</p>
              </div>
              <div class="row">
                <p class="mb-0 col-4">Concentration: </p>
                <p class="mb-0 col-auto"> ' . $concentration . '</p>
              </div>
              <br>
              <p class="mb-0">' . $creation_date . '</p>
              <hr>

              <div class="row">
              <p class="mb-0 col-auto">Select club category you interest the most: </p>
              <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2 col-auto">
                <li><button class="dropdown-item" type="button">Spiritual</button></li>
                <li><button class="dropdown-item" type="button">Political</button></li>
                <li><button class="dropdown-item" type="button">Social Justice/Activism</button></li>
                <li><button class="dropdown-item" type="button">Business Related</button></li>
                <li><button class="dropdown-item" type="button">Social</button></li>
                <li><button class="dropdown-item" type="button">Cultural</button></li>
                <li><button class="dropdown-item" type="button">Charitable</button></li>
                <li><button class="dropdown-item" type="button">Special Interest/Hobby</button></li>
                <li><button class="dropdown-item" type="button">Arts</button></li>
                <li><button class="dropdown-item" type="button">Career Development</button></li>
                <li><button class="dropdown-item" type="button">Technology</button></li>
                <li><button class="dropdown-item" type="button">other</button></li>
                <li><button class="dropdown-item" type="button">select a category</button></li>
              </ul></div>

              <small class="mb-0">If you want to change your account info, go to <a href="account.php">My Account</a></small>
            </div>
          </div>'
          ;
      } else{
          echo "ERROR: Hush! Sorry $sql. "
              . mysqli_error($conn);
      }


  ?>


  <div class="text-center">
    <a href="login.php" class="btn btn-primary" role="button" aria-disabled="true">Ok</a>
  </div>

</div>


<?php
  require('footer.php')
?>
