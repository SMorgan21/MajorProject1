<?php
include 'connect.php';
$email = mysqli_real_escape_string($dbcon, $_POST['changeEmail']);

$check = $dbcon->query("SELECT * from refDetails where email = '$email'");//checks database for the email that is being typed in
$check_num_rows = mysqli_num_rows($check);//checks to see if there are ay rows containing the email 


if (strlen($email)<=3) { //if the email the user types in is less than or equal to 3 charachters 

  echo '<div class="alert alert-primary">Please enter your registered email address</div>';

}else {
  if ($check_num_rows==0) { //if the result of the search is equal to 0
      echo '<div class="alert alert-danger"><strong>Your email is not recognised</strong></div>';
    }elseif ($check_num_rows==1) {// if the result of the search is equal to 1
      echo '<div class="alert alert-success">Email recognised</div>';
    }
}
   ?>
