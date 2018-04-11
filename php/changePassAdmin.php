<?php
include 'connect.php';
$email = mysqli_real_escape_string($dbcon, $_POST['changeEmailAdmin']);

$check = $dbcon->query("SELECT * from refDetails where email = '".$_SESSION['email']."'");//checks database for the username that is being typed in
$check_num_rows = mysqli_num_rows($check);//checks to see if there are ay rows containing the username entered

if (strlen($email)<= 3) {

  echo '<div class="alert alert-primary">Please enter your registered email address</div>';

}else {
  if ($check_num_rows==0) {
      echo '<div class="alert alert-danger"><strong>Your email is not recognised</strong></div>';
    }elseif ($check_num_rows==1) {
      echo '<div class="alert alert-success">Email recognised</div>';
    }
}
   ?>
