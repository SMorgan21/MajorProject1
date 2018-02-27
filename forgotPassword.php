<?php
if (isset($_POST["forgotPassword"])) {
  include 'php/connect.php';
  $email = mysqli_real_escape_string($dbcon,$_POST['email']);

  $data = $dbcon->query("SELECT id FROM refDetails Where email='$email'");

  if ($data->num_rows > 0) {
    $string = "0987654321zxcvbnmpoiuytrewqasdfghjkl"; //random characters
    $string = str_shuffle($string);//shuffle the random characters
    $string = substr($string, 0, 10);//creates a string between 0 and 15 characters from the random characters
    $url = "http://localhost/MajorProject/resetPassword.php?token=$string&email=$email";

    //mail($email, "Reset Password", "To reset your password, Please visit this link: $url", "From: noreply@footballhub.com\r\n");
    $data = $dbcon->query("UPDATE refDetails SET token='$string' WHERE email='$email'");
    echo "please check your mail";//BOOTSTRAP!!

  }else {
    echo "The email you entered is not registered";//sort bootrap
  }
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
  <title>Forgot Password</title>
</head>
<body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/check.js" type="text/javascript"></script>
  <!-- check if email is recognised in system!! -->
  <div class="container-fluid" id="register">
    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-3">
        <div class="text-center">
          <img src="/MajorProject/images/FAW_logo.png" class="img-fluid" alt="FAWlogo" id="fawLogo1">
        </div>
        <div class="container-fluid" id="regContainer">
          <form name="regForm" method="post" action="forgotPassword.php">
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" type="email" name="email" id="email" placeholder="Email" maxlength="150" autocomplete="email" required>
            </div>
            <input type="submit" class="btn btn-primary" name="forgotPassword" value="Request Password" id="forgotPassword">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
