<?php
  require('header.php')
?>

<?php
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $conn = mysqli_connect("localhost", "ttn25","2F6BNtjHUyPSwh6nFLx9", "club_reviews");
    $my_email = $_SESSION['email'];

    //send new data to database
    if(isset($_POST['submit'])){
      //user info
      $first_name =  $_POST['first_name'];
      $last_name =  $_POST['last_name'];
      $sfu_mail =  $_POST['sfu_mail'];
      $password =  $_POST['password'];
      $concentration =  $_POST['concentration'];
      //club info
      $club_description = $_POST['club_description'];
      $club_contact = $_POST['club_contact'];
      $club_notes = $_POST['club_notes'];

      $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', sfu_mail='$sfu_mail', password='$password', concentration='$concentration' WHERE sfu_mail = '$my_email'";

      $sql_club = "UPDATE clubs,admin_users,users SET club_description='$club_description', club_contact='$club_contact', club_notes='$club_notes'  WHERE sfu_mail = '$sfu_mail' AND clubs.club_id=admin_users.club_id AND users.user_id= admin_users.user_id";
      //echo '<p>query:' . $sql_club . '</p>';

      if(mysqli_query($conn, $sql_club)){
        echo '
        <div class="alert alert-warning alert-dismissible fade show position-fixed bottom-0 end-0 p-3" role="alert" style="position:relative;
       z-index:1000;">
          <strong>Save changed</strong>  &nbsp &nbsp &nbsp
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
      }
      mysqli_query($conn, $sql);
    }

    //request data from database
    $sql = "SELECT first_name, last_name, sfu_mail, password, concentration, club_admin FROM users WHERE sfu_mail = '$my_email'";
    #echo '<p>query:' . $sql . '</p>';
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);
    echo '
    <!--start of account-->
    <small class="text-danger">Note: avoid using quotation marks when filling in information</small>
    <form class="container" action="" method="POST">
      <!--account info starts -->
      <div>
        <h3 class="my-3">Account settings</h3>
        <div class="row g-3 align-items-left mb-3 mr-auto">
          <div class="col-3">
            <label for="create-account-first-name" class="col-form-label">First name</label>
          </div>
          <div class="col-auto">
            <input type="text" class="form-control required" id="change-account-first-name" name="first_name" value="' . $row[0] . '">
          </div>
        </div>

        <div class="row g-3 align-items-left mb-3">
          <div class="col-3">
            <label for="create-account-last-name" class="col-form-label">Last name</label>
          </div>
          <div class="col-auto">
            <input type="text" class="form-control" id="change-account-last-name" name="last_name" value="' . $row[1] . '">
          </div>
        </div>

        <div class="row g-3 align-items-left mb-3">
          <div class="col-3">
            <label for="create-account-email" class="col-form-label">SFU email</label>
          </div>
          <div class="col-auto">
            <input type="email" class="form-control required" id="change-account-email" name="sfu_mail" value="' . $row[2] . '">
          </div>
        </div>

        <div class="row g-3 align-items-left mb-3">
          <div class="col-3">
            <label for="create-account-password" class="col-form-label">Password</label>
          </div>
          <div class="col-auto">
            <input type="password" class="form-control required" id="change-account-password" name="password" value="' . $row[3] . '">
          </div>
        </div>

        <div class="row g-3 align-items-left mb-3">
          <div class="col-3">
            <label for="create-account-password" class="col-form-label">Concentration</label>
          </div>
          <div class="col-auto">
            <input type="text" class="form-control" id="change-account-concentration" name="concentration" value="' . $row[4] . '">
          </div>
        </div>

      </div>
      <!--account info ends -->
      <br>

      <!--club setting start-->
      <div style="max-width: 700px;">
        <h3 class="my-3">Clubs settings </h3>

    ';

    //if account holder is not admin:
    if ($row[5] != 1) {
      echo '
        <p>You are not a club admin. <a href="#modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add new</a></p>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Creating new club</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="container">
                  <div class="row mb-3">
                    <div class="input-group mb-3">
                      <span class="input-group-text">Club name</span>
                      <input type="text" class="form-control" placeholder="club name" aria-label="club name" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text">Club description</span>
                      <input type="text" class="form-control" placeholder="club description" aria-label="club description" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text">Club email:</span>
                      <input type="email" class="form-control" placeholder="club email" aria-label="club email" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text">Other notes</span>
                      <input type="text" class="form-control" placeholder="club notes" aria-label="club notes" aria-describedby="basic-addon1">
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Confirm</button>
              </div>
            </div>
          </div>
        </div>

        <hr>
        ';
    }

    //if account holder is admin:
    if ($row[5] == 1) {
      $sql = "SELECT club_name, club_description, club_contact,club_notes FROM clubs, users, admin_users WHERE sfu_mail = '$my_email' AND users.user_id= admin_users.user_id AND clubs.club_id=admin_users.club_id";
      #echo '<p>query:' . $sql . '</p>';
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_row($result);
      $club_name = $row[0];
      $club_description = $row[1];
      $club_contact = $row[2];
      $club_notes = $row[3];
      echo '
          <!--club setting of one club start-->
          <div class="container">
            <div class="row mb-3">
              <h5 class="col-6">' . $club_name . '</h5>
              <button class="btn btn-warning btn-sm col-4" id="removeable" onclick="removeable()">Remove this club</button>
            </div>

            <div class="form-floating mb-3">
              <textarea class="form-control" name="club_description" placeholder="Club description" style="min-height: 120px; resize: none;">' . $club_description . '</textarea>
              <label for="floatingTextarea">Club description:</label>
            </div>

            <div class="form-floating mb-3">
              <textarea class="form-control" name="club_contact" placeholder="Contact" style="height: 65px; resize: none;">' . $club_contact . '</textarea>
              <label for="floatingTextarea">Contact email:</label>
            </div>

            <div class="form-floating mb-3">
              <textarea class="form-control" name="club_notes" placeholder="Notes" style="min-height: 120px; resize: none;">' . $club_notes . '</textarea>
              <label for="floatingTextarea">Other notes:</label>
            </div>
          </div>
          <!--club setting of one club end -->
          <hr>';
    }


    //preferences
    echo '
    </div>
          <!--club setting end-->
          <!--preferences setting start-->
          <div>
            <h3 class="my-3">Preferences</h3>
            <div class="col">
              <div class="card row-sm-2">
                <div class="card-body">
                  <h5 class="card-title">Club name 1</h5>
                  <p class="card-text">About: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a href="clubpage.php" class="btn btn-primary">View</a>
                  <a href="#" class="btn btn-warning">Unfollow</a>
                </div>
              </div>

              <div class="card row-sm-2">
                <div class="card-body">
                  <h5 class="card-title">Club name 2</h5>
                  <p class="card-text">About: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a href="clubpage.php" class="btn btn-primary">View</a>
                  <a href="#" class="btn btn-warning">Unfollow</a>
                </div>
              </div>

              <div class="card row-sm-2">
                <div class="card-body">
                  <h5 class="card-title">Club name 3</h5>
                  <p class="card-text">About: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a href="clubpage.php" class="btn btn-primary">View</a>
                  <a href="#" class="btn btn-warning">Unfollow</a>
                </div>
              </div>
            </div>
          </div>
          <!--preferences settting end-->
          <input class="col-4 btn btn-primary" name ="submit" type="submit" value="Save changes">

        </form>

        <!--end of account -->
      ';
  } else {echo '<!--if(!empty($_SESSION["userId"])) -->
    <div class="container" style="width: 50%; min-width: 430px;">
      <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Access denied!</h4>
        <hr>
        <p class="mb-0 col-4">You need to <a href="login.php">log in</a> to view this page.</p>
        <small class="mb-0">Back to <a href="home.php">Home</a></small>
      </div>
    </div>';
  }

?>



<?php
  require('footer.php')
?>
