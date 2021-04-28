<?php
  $user_check = (isset($_SESSION['email']) && trim($_SESSION['username'])!='')?trim($_SESSION['username']):false;
  if(!$user_check) header("Location: index.php");
  else{
      $ses_sql = mysqli_query($db,"SELECT username FROM users WHERE username='$user_check' ");
      $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
      $$_SESSION['username']=$row['username'];
  }
?>
