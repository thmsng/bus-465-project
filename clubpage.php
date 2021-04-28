<?php
  require('header.php');

  if (isset($_GET['club'])) {
    $club_name_search_str = $_GET['club'];

    $sql = "SELECT club_name,club_logo_src,club_description, club_contact, club_notes FROM clubs WHERE club_name = '" . $club_name_search_str . "'";

    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_row($result)) {
      $club_name = $row[0];
      $club_logo_src = $row[1];
      $club_description = $row[2];
      $club_contact = $row[3];
      $club_notes = $row[4];
    }
  }

  echo '
  <div class="my-3 container">
    <h5 class=""> ' . $club_name . ' </h5>
    <div class="row">
      <img class="col-2 img-fluid" src="' . $club_logo_src . '" alt="" max-height="90">
      <div class="col-9">
        <p class="">' . $club_description . '</p>
        <p class="">Contact: ' . $club_contact . '</p>
        <p class="">Notes: ' . $club_notes . '</p>
        <div class="toggle radios">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline1">Follow this club</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline2">Unfollow</label>
          </div>
        </div>
      </div>
    </div>
    <script>
    function sendRequestToBeClubAdmin () {
      alert("your request to become admin is sent!");
    }
    </script>
    <div class="alert alert-warning my-4" role="alert">If you know about this club <a href="form.php?club=' . $club_name_search_str . '">Rate this Club</a> to give us more info, or <a href="#" onclick="sendRequestToBeClubAdmin()">Get admin role</a> if you are executive of this club</div>
  </div>

  <br>
  ';
  //get agregate category
  $sql = "SELECT category_group, skill_group FROM reviews JOIN clubs ON reviews.club_id=clubs.club_id WHERE clubs.club_name= '$club_name'";

  $result = mysqli_query($conn, $sql);
  $category_array = [];
  $skill_array = [];

  while($row = mysqli_fetch_row($result)) {
    $category_array = array_merge($category_array,explode(" -", $row[0]));
    $skill_array = array_merge($skill_array,explode(",",$row[1]));
  };

  //sort category & skills by frequency
  $counts1 = array_count_values($category_array);
  arsort($counts1);
  $counts2 = array_count_values($skill_array);
  arsort($counts2);

  echo '
  <div class="detail container">
    <h5>Category</h5>
    <div>
      <!--loop over categories-->';

  foreach ($counts1 as $cate => $value) {
    echo '<button type="button" class="btn btn-outline-primary m-1">' . $cate . '<span class="badge badge-light">' . $value . '</span></button>';
  };

  echo  '
    </div>

    <br><br>

    <!--start of all skills-->
    <div>
      <h5>Skills</h5>
      <!--loop over list of skills-->
      ';

  foreach ($counts2 as $skill => $value) {
    echo '<button type="button" class="btn btn-outline-primary m-1">' . $skill . '<span class="badge badge-light">' . $value . '</span></button>';
  };

    echo '

    </div>
    <!--end of all skills-->

    <br><br>
  ';

  //getting reviews from database
  $sql = "SELECT first_name, last_name, category_group, skill_group, fun, time_commitment, review, helpful, submit_date FROM reviews JOIN clubs ON reviews.club_id=clubs.club_id JOIN users ON reviews.user_id=users.user_id WHERE clubs.club_name= '$club_name'";

  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_row($result)) {
      //cells in row
    $first_name = substr($row[0],0,1);
    $last_name = substr($row[1],0,1);
    //$category = $row[2];
    //$skill_group = $row[3];
    $fun = ($row[4]-1)*100/2;
    $time_commit = ($row[5]-1)*100/2;
    $review = $row[6];
    $helpful = $row[7];
    $submit_date = $row[8];

    echo '
    <!--start of all reviews -->
    <div>
      <h5>Reviews</h5>
      <br>
      ';
    echo '
      <!--loop over each review from database [time][fun][date][comment][helpful rating]-->
      <!--start of this review-->
      <div class="row">
        <div class="col-sm-4">
          <div>
            <div class="progress">
              <div class="progress-bar w-' . $time_commit . '" role="progressbar" aria-valuenow="' . $time_commit . '" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>Time commitment</p>
          </div>
          <div>
            <div class="progress">
              <div class="progress-bar w-' . $fun . '" role="progressbar" aria-valuenow="' . $fun . '" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>Fun</p>
          </div>

          <div class="inline">
            <button type="button" class="btn btn-success m-1" disabled>helpful</button>
            <button type="button" class="btn btn-danger m-1" disabled>not helpful</button>
          </div>

        </div>
        <div class="col-sm-8 review">
          <blockquote class="blockquote text-right">
            <h6>Comment:</h6>
            <p class="mb-4">' . $review .'</p>
            <footer class="blockquote-footer"> ' . $first_name .'. ' . $last_name . ' on a beautiful day of ' . $submit_date . ' </footer>
          </blockquote>
        </div>
      </div>
      <hr>
      <!--end of this review -->
      ';

    echo'
    </div>
    <!--end of all reviews-->
    ';
  }
?>

<div class="events container">
  <h4>Events coming up</h2>

  <!--list of events-->
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Event name</th>
        <th scope="col">Description</th>
        <th scope="col">Location</th>
        <th scope="col">Time</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $sql = "SELECT event_ID, events.club_ID, event_name, event_description, event_location, event_time, club_name FROM events JOIN clubs ON events.club_ID=clubs.club_id WHERE event_time > NOW() AND club_name = '" . $club_name_search_str . "'";

      $result = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_row($result)) {
          //cells in row
        $event_ID = $row[0];
        $club_ID = $row[1];
        $event_name = $row[2];
        $event_description = $row[3];
        $event_location = $row[4];
        $event_time = $row[5];
        $club_name = $row[6];

        echo '
          <tr>
            <td>' . $event_name . '</td>
            <td>' . $event_description . '</td>
            <td>' . $event_location . '</td>
            <td>' . $event_time . '</td>
          </tr>';
      }

      ?>

    </tbody>
  </table>
</div>




<?php
  require('footer.php');
?>
