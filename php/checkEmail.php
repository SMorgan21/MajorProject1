<?php
include 'connect.php';
$email = mysqli_real_escape_string($dbcon, $_POST['email']);

$check = $dbcon->query("SELECT email FROM refDetails WHERE email = '$email'");//checks database for the username that is being typed in
$check_num_rows = mysqli_num_rows($check);//checks to see if there are ay rows containing the username entered

if ($email==NULL) {

  echo "";//I dont want this to display anythig at this point as the placeholder gives the user enough instruction

}else {
  if ($check_num_rows==0) {
      echo '<div class="alert alert-success">Email address is <strong>Avaliable</strong></div>';
    }elseif ($check_num_rows==1) {
      echo '<div class="alert alert-danger">Sorry but that email address is already registered, please try another one or click on the login link at the bottom of the page</div>';
    }
}
   ?>
