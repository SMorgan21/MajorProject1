<?php
include 'connectRef.php';
$userName = mysqli_real_escape_string($dbcon, $_POST['userName']);

$check = mysqli_query($dbcon,"SELECT userName FROM refDetails WHERE userName = '$userName'");//checks database for the username that is being typed in
$check_num_rows = mysqli_num_rows($check);//checks to see if there are ay rows containing the username entered

if ($userName==NULL) {

  echo "";//I dont want this to display anythig at this point as the placeholder gives the user enough instruction

}elseif (strlen($userName)<=3) {
  echo '<div class="alert alert-warning">Your username must have more than <strong> 3 characters</strong></div>';
}
else {
  if ($check_num_rows==0) {
    echo '<div class="alert alert-success">Congratulations your username is <strong>Avaliable</strong></div>';
  }elseif ($check_num_rows==1) {
    echo '<div class="alert alert-danger">Sorry but someone already has that username please try another one</div>';
  }
}
 ?>
