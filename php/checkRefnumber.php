<?php
include 'connectRef.php';
$refereeNumber = mysqli_real_escape_string($dbcon, $_POST['refereeNumber']);

$check = mysqli_query($dbcon,"SELECT refereeNumber FROM refDetails WHERE refereeNumber = '$refereeNumber'");//checks database for the username that is being typed in
$check_num_rows = mysqli_num_rows($check);//checks to see if there are ay rows containing the username entered

if ($refereeNumber==NULL) {

  echo "";//I dont want this to display anythig at this point as the placeholder gives the user enough instruction

}else {
  if ($check_num_rows==0) {
      echo '<div class="alert alert-success">Referee Number <strong>Avaliable</strong></div>';
    }elseif ($check_num_rows==1) {
      echo '<div class="alert alert-danger">Sorry but that Referee number is already registered, please try another one or click on the login link at the bottom of the page</div>';
    }
}
   ?>
