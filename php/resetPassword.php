<?php

  if (isset($_GET["email"]) && isset($_GET["token"])) {
    include 'php/connect.php';
    $email = mysqli_real_escape_string($dbcon,$_GET['email']);
    $token = mysqli_real_escape_string($dbcon,$_GET['token']);

    $data = $dbcon->query("SELECT id FROM refDetails WHERE email='$email' AND token='$token'");

    if ($data->num_rows > 0) {
      $string = "0987654321zxcvbnmpoiuytrewqasdfghjkl"; //random characters
      $string = "0987654321zxcvbnmpoiuytrewqasdfghjkl"; //random characters
      $string = str_shuffle($string);//shuffle the random characters
      $string = substr($string, 0, 15);//creates a string between 0 and 15 characters from the random characters
      $resetPassword = password_hash($string, PASSWORD_BCRYPT);//encrypts the password using the BLOWFISH method

      $dbcon->query("UPDATE refDetails SET password = '$resetPassword', token='' WHERE email='$email'");//this updates the database with the new password and removes the token so that it is not possible to reuse old links
      echo "Your new password is: $string";
    }
  }else {
    header("location: login.php");
    exit();
  }

 ?>
