<?php
  require('header.php');
  //need to login to give review
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //need club link to review a club
    if (isset($_GET['club'])) {
      $club_name_search_str = $_GET['club'];
      $_SESSION['club'] = $club_name_search_str;

      //render here
      echo '
      <form class="container club-rating-form" action="formsubmit.php" method="POST">
        <h3>Rating ' .$club_name_search_str . ' ...</h3>

        <br>

        <!--loop over categories-->
        <div>
          <h4>Category</h4>
          <p>Select all categories this club belong to:</p>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios1" value="Arts">
            <label class="form-check-label" for="Radios1">
              Arts
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios2" value="Business Related">
            <label class="form-check-label" for="Radios2">
              Business Related
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios3" value="Career Development">
            <label class="form-check-label" for="Radios3">
              Career Development
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios4" value="Charitable">
            <label class="form-check-label" for="Radios4">
              Charitable
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios5" value="Cultural">
            <label class="form-check-label" for="Radios5">
              Cultural
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios6" value="Political">
            <label class="form-check-label" for="Radios6">
              Political
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios7" value="Social">
            <label class="form-check-label" for="Radios7">
              Social
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios8" value="Social Justice/Activism">
            <label class="form-check-label" for="Radios8">
              Social Justice/Activism
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios9" value="Special Interest/Hobby">
            <label class="form-check-label" for="Radios9">
              Special Interest/Hobby
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios10" value="Spiritual">
            <label class="form-check-label" for="Radios10">
              Spiritual
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios11" value="Technology">
            <label class="form-check-label" for="Radios11">
              Technology
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cate[]" id="Radios12" value="Other">
            <label class="form-check-label" for="Radios12">
              Other
            </label>
          </div>

        </div>
        <!-- end of all categories-->

        <br>

        <!--start of skills listing-->
        <div>
          <h4>Skills</h4>
          <p>What skills have you gained from this club:</p>
          <input id="skillInput" name ="skillInput" type="text" value="" data-role="tagsinput" class="form-control"/>
        </div>

        <!--end of skills listing-->
        <br>
        <!--start of rating-->
        <div class="row">
          <h4>Rating</h4>
          <div class="form-group col">
            <label for="ratingFun">Fun</label>
            <select class="form-control col-10" name="fun" id="ratingFun">
              <option value="1">Not at all</option>
              <option value="2">A little</option>
              <option value="3">A lot</option>
              <option value="4">Not sure</option>
            </select>
          </div>

          <div class="form-group col">
            <label for="ratingTime">Time commitment</label>
            <select class="form-control" name="timecommit" id="ratingTime">
              <option value="1">less than 1h per week</option>
              <option value="2">1-5 hours a week</option>
              <option value="3">More than 5 hours a week</option>
              <option value="4">Not sure</option>
            </select>
          </div>

        </div>
        <!--end of rating-->
        <br>
        <!--start of review-->
        <div class="">
          <h4>Review</h4>
          <p>Write a short review to tell us more about this club:</p>
          <textarea class="form-control" id="singleReview" name="review" rows="3"></textarea>
        </div>
        <!--end of review-->
        <br>
        <!--submit button-->
        <a href="formsubmit.php">
          <button type="submit" class="btn btn-primary">Submit</button>
        </a>

      </form>

      ';
    }
    else echo 'club not found!';
  }
  else {
    echo '
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
