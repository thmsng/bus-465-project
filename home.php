<?php
  require('header.php');
?>

<!--hero banner-->
<div class="hero-banner row container mb-4">
  <div class="img-content col-md-6">
    <img class="img-responsive" src="hero.jpg" alt="hero-image" width="410" height="307">
  </div>
  <div class="banner-content col-md-6">
    <h1>Find the best club for you</h1>
    <h2>Here's how to use the site</h2>
    <h3>1.Find clubs by name or category of your interest</h3>
    <h3>2.Read reviews to decide which one to join </h3>
    <h3>3.Discover exciting events</h3>
    <h3>4.Leave reviews when you come back</h3>
  </div>
</div>


<!--search function (if have time change name -> id instead) -->
<?php
  $sql= " SELECT club_name FROM clubs";
  $club_name_array = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array[] = $cell;
  }

  #category 1
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=1";
  $club_name_array_cat1 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat1[] = $cell;
  }

  #category 2
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=2";
  $club_name_array_cat2 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat2[] = $cell;
  }

  #category 3
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=3";
  $club_name_array_cat3 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat3[] = $cell;
  }

  #category 4
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=4";
  $club_name_array_cat4 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat4[] = $cell;
  }

  #category 5
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=5";
  $club_name_array_cat5 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat5[] = $cell;
  }

  #category 6
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=6";
  $club_name_array_cat6 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat6[] = $cell;
  }

  #category 7
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=7";
  $club_name_array_cat7 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat7[] = $cell;
  }

  #category 8
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=8";
  $club_name_array_cat8 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat8[] = $cell;
  }

  #category 9
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=9";
  $club_name_array_cat9 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat9[] = $cell;
  }

  #category 10
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=10";
  $club_name_array_cat10 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat10[] = $cell;
  }

  #category 11
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=11";
  $club_name_array_cat11 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat11[] = $cell;
  }

  #category 12
  $sql= " SELECT club_name FROM clubs where sfss_categoryID=12";
  $club_name_array_cat12 = array();
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    //loop cells in row
    $cell = $row[0];
    $club_name_array_cat12[] = $cell;
  }
?>


<form autocomplete="off" class="container input-group mb-5 row">
  <h4>Find club by name:</h4>
  <div class="autocomplete col-9">
    <input class="form-control" type="search" placeholder="Find a club" aria-label="Search" id="clubname-autocomplete">
  </div>
  <div class="input-group-append col-auto"><button class="btn btn-outline-primary" type="button" onclick="clubSearch()">Search</button></div>
</form>


<!--listing of clubs -->
<div class="club-list row container-fluid justify-content-center mb-5">
  <h4>Find club by categories:</h4>
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Categories
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray1)">Spiritual</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray2)">Political</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray3)">Social Justice/Activism</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray4)">Business Related</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray5)">Social</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray6)">Cultural</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray7)">Charitable</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray8)">Special Interest/Hobby</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray9)">Arts</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray10)">Career Development</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray12)">Technology</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs(jArray11)">other</button></li>
    <li><button class="dropdown-item" type="button" onclick="populateClubs([])">select a category</button></li>
  </ul>
  <ul class="list-group club-listing">

  </ul>
</div>



<div class="events container mb-5">
  <h4>Events coming up</h2>

  <!--list of events-->
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Club</th>
        <th scope="col">Event name</th>
        <th scope="col">Description</th>
        <th scope="col">Location</th>
        <th scope="col">Time</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $sql = "SELECT event_ID, events.club_ID, event_name, event_description, event_location, event_time, club_name FROM events JOIN clubs ON events.club_ID=clubs.club_id WHERE event_time > NOW()";

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
            <td><a href = "https://datalab3.bus.sfu.ca/ttn25/project/clubpage.php?club=' . $club_name . '">' . $club_name . '</a></td>
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

<script src="auto-complete.js"></script>
<script type="text/javascript">
  var jArray = [<?php echo '"'.implode('","', $club_name_array).'"' ?>];
  var jArray1 = [<?php echo '"'.implode('","', $club_name_array_cat1).'"' ?>];
  var jArray2 = [<?php echo '"'.implode('","', $club_name_array_cat2).'"' ?>];
  var jArray3 = [<?php echo '"'.implode('","', $club_name_array_cat3).'"' ?>];
  var jArray4 = [<?php echo '"'.implode('","', $club_name_array_cat4).'"' ?>];
  var jArray5 = [<?php echo '"'.implode('","', $club_name_array_cat5).'"' ?>];
  var jArray6 = [<?php echo '"'.implode('","', $club_name_array_cat6).'"' ?>];
  var jArray7 = [<?php echo '"'.implode('","', $club_name_array_cat7).'"' ?>];
  var jArray8 = [<?php echo '"'.implode('","', $club_name_array_cat8).'"' ?>];
  var jArray9 = [<?php echo '"'.implode('","', $club_name_array_cat9).'"' ?>];
  var jArray10 = [<?php echo '"'.implode('","', $club_name_array_cat10).'"' ?>];
  var jArray11 = [<?php echo '"'.implode('","', $club_name_array_cat11).'"' ?>];
  var jArray12 = [<?php echo '"'.implode('","', $club_name_array_cat12).'"' ?>];
  console.log(jArray1);
  autocomplete(document.getElementById("clubname-autocomplete"), jArray);
</script>

<?php
  require('footer.php')
?>
