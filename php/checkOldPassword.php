<?php
include 'connect.php';
$oldPassword = mysqli_real_escape_string($dbcon, $_POST['oldPassword']);

$data = $dbcon->query("SELECT password FROM refDetails WHERE email='$_SESSION["email"]");//executes a query to the database which selects an id and password that matches the email entered
  if ($data->num_rows > 0) {//if a the number of matches are greater than 0
    $passData = $data->fetch_array();//puts the data from the databass into an array and then into a variable
    if (password_verify($oldPassword, $passData['password'])) {

    	echo


}
 ?>
