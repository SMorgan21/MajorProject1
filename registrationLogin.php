<?php
//Starting Session
session_start();

//Redirects a logged in user back to their profile page
if (isset($_SESSION["email"]) && isset ($_SESSION["loggedIn"])) {
  header("location: profile.php");
};

if (isset($_POST['registration'])) {

  include 'php/connect.php';//connection details
  $firstName = mysqli_real_escape_string($dbcon, $_POST['firstName']);
  $firstNameClean = filter_var($firstName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $secondName = mysqli_real_escape_string($dbcon,$_POST['secondName']);
  $secondNameClean = filter_var($secondName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $userName = mysqli_real_escape_string($dbcon,$_POST['userName']);
  $userNameClean = filter_var($userName, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
  $password = mysqli_real_escape_string($dbcon,$_POST['password']);
  $passwordClean = filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $gender = mysqli_real_escape_string($dbcon,$_POST['gender']);
  $grade = mysqli_real_escape_string($dbcon,$_POST['grade']);
  $gradeClean = filter_var($grade, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $email = mysqli_real_escape_string($dbcon,$_POST['email']);
  $emailClean = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
  $telephoneNo = mysqli_real_escape_string($dbcon,$_POST['telephoneNo']);
  $telephoneNoClean = filter_var($telephoneNo, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
  $refereeNumber = mysqli_real_escape_string($dbcon,$_POST['refereeNumber']);
  $refereeNumberClean = filter_var($refereeNumber, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
  $hashed = password_hash($passwordClean, PASSWORD_BCRYPT);//encrypts the password using blowfish encryption

  //Query
  $data = $dbcon->query("INSERT INTO refDetails (firstName, secondName, userName, password, gender, grade, telephoneNo, email, refereeNumber, token) VALUES('$firstNameClean','$secondNameClean','$userNameClean', '$hashed','$gender','$gradeClean', '$telephoneNoClean','$emailClean','$refereeNumberClean','$token')");

}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/MajorProject/Css/styles.css">
  <title>Registration</title>
</head>
<body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-3">
        <div class="text-center">
  <div class="container-fluid regContainer">
  <div class="text-center">
  <p>You have been registered successfully</p>
  <a class="btn btn-primary" href="login.php">Click here to login using the details you have just registered</a>  
  </div>
  </div>
  </div>
  </div>
  </div>
</div>

    </body>
    </html>
