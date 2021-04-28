<?php
  require('header.php')
?>

<!--start of create account -->
<div class="container text-center" style="min-height: 82vh;">
  <br>
  <h3>Create an account</h3>
  <h6>Create your account, it takes less than a minute. If you already have an account <a href="login.php">login</a></h6>
  <br>

  <!--start of create account inputs-->
  <form class="container" style="width: 50%; min-width: 430px;" action="create-account-success.php" method="POST">
    <div class="row g-3 align-items-left mb-3 mr-auto">
      <div class="col-3">
        <label for="create-account-first-name" class="col-form-label">First name</label>
      </div>
      <div class="col-9">
        <input type="text" class="form-control required" id="create-account-first-name" name="first_name">
      </div>
    </div>

    <div class="row g-3 align-items-left mb-3">
      <div class="col-3">
        <label for="create-account-last-name" class="col-form-label">Last name</label>
      </div>
      <div class="col-8">
        <input type="text" class="form-control" id="create-account-last-name" name="last_name">
      </div>
    </div>

    <div class="row g-3 align-items-left mb-3">
      <div class="col-3">
        <label for="create-account-email" class="col-form-label">SFU email</label>
      </div>
      <div class="col-7">
        <input type="email" class="form-control required" id="create-account-email" name="sfu_mail">
      </div>
    </div>

    <div class="row g-3 align-items-left mb-3">
      <div class="col-3">
        <label for="create-account-password" class="col-form-label">Password</label>
      </div>
      <div class="col-6">
        <input type="password" class="form-control required" id="create-account-password" name="password">
      </div>
    </div>

    <div class="row g-3 align-items-left mb-3">
      <div class="col-3">
        <label for="create-account-concentration" class="col-form-label">Concentration</label>
      </div>
      <div class="col-5">
        <input type="text" class="form-control" id="create-account-concentration" name="concentration">
      </div>
      <button class="col-4 btn btn-primary" type="submit">Create Account</button>
    </div>

  </form>
</div>
<!--end of create account -->

<?php
  require('footer.php')
?>
