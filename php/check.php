<?php
include 'connect.php';
$userName = mysqli_real_escape_string($dbcon, $_POST['userName']);

$check = mysqli_query($dbcon,"SELECT userName FROM refDetails WHERE userName = '$userName'");//checks database for the username that is being typed in
$check_num_rows = mysqli_num_rows($check);//checks to see if there are ay rows containing the username entered

if ($userName==NULL) {

  echo "Enter a User Name";

}elseif (strlen($userName)<=3) {
  echo "Username must have more than 3 characters";
}
else {
  if ($check_num_rows==0) {
    echo "Username Avaliable";
  }elseif ($check_num_rows==1) {
    echo "Username Already Registered";
  }
}
 ?>
