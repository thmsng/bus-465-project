<?php
  require('header.php');
  $club_name = $_SESSION['club'];
  $category_array = implode( ' -', $_POST['cate']);
  $fun =$_POST['fun'];
  $time_commit = $_POST['timecommit'];
  $review_input = $_POST['review'];
  $skill_input = $_POST['skillInput'];
  $creation_date = date('Y-m-d');
  $user_email = $_SESSION['email'];

  //get club and user id:
  $sql_user = "SELECT user_id FROM users WHERE sfu_mail = '$user_email'";
  $result = mysqli_query($conn,$sql_user);
  $row = mysqli_fetch_row($result);
  $user_id = $row[0];

  $sql_club = "SELECT club_id FROM clubs WHERE club_name = '$club_name'";
  $result = mysqli_query($conn,$sql_club);
  $row = mysqli_fetch_row($result);
  $club_id = $row[0];

  //compile sql query
  $sql = "INSERT INTO reviews (user_id, club_id, category_group, skill_group, fun, time_commitment, review, submit_date) VALUES ($user_id,$club_id,'$category_array','$skill_input', $fun, $time_commit,'$review_input','$creation_date')";

  //send to server
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
      <h1 class="text-center">Thank you for your input!</h1>
      <br>
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Your review:</h4>
          <hr>
          <div class="row">
            <p class="mb-0 col-4">Club: </p>
            <p class="mb-0 col-auto">' . $club_name . '</p>
          </div>
          <div class="row">
            <p class="mb-0 col-4">Category: </p>
            <p class="mb-0 col-auto">' . $category_array . '</p>
          </div>
          <div class="row">
            <p class="mb-0 col-4">Fun rating: </p>
            <p class="mb-0 col-auto">option ' . $fun . '</p>
          </div>
          <div class="row">
            <p class="mb-0 col-4">Time commitment rating: </p>
            <p class="mb-0 col-auto">option ' . $time_commit . '</p>
          </div>
          <div class="row">
            <p class="mb-0 col-4">Skills gained: </p>
            <p class="mb-0 col-auto"> ' . $skill_input . '</p>
          </div>
          <div class="row">
            <p class="mb-0 col-4">Review: </p>
            <p class="mb-0 col-auto"> ' . $review_input . '</p>
          </div>
          <br>
          <p class="mb-0">' . $creation_date . '</p>';

  } else{
      echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($conn);
  }
?>
  <div class="container justify-content-center" >
    <div class="text-center">
      <?php echo '
        <a href = "https://datalab3.bus.sfu.ca/ttn25/project/clubpage.php?club=' . $club_name .'" class="btn btn-primary" role="button" aria-disabled="true">Back</a>

      '; ?>

    </div>

  </div>



<?php
  unset($_SESSION['club']);
  require('footer.php')
?>
