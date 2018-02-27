<?php
//Starting Session
session_start();

//Redirects a logged in user back to their profile page
if (isset($_SESSION["email"]) && isset ($_SESSION["loggedIn"])) {
  header("location: profile.php");
};


if (isset($_POST['login'])) {//listening for the login button
  include 'php/connect.php';//includes the database connection information
  $email = mysqli_real_escape_string($dbcon,$_POST['email']);//posts the email entered by the user
  $password = mysqli_real_escape_string($dbcon,$_POST['password']); //posts the password entered by the user
  $data = $dbcon->query("SELECT id, password, userName FROM refDetails WHERE email='$email'");//executes a query to the database which selects an id and password that matches the email entered
  if ($data->num_rows > 0) {//if a the number of matches are greater than 0
    $passData = $data->fetch_array();//puts the data from the databass into an array and then into a variable
    if (password_verify($password, $passData['password'])) {//if the password in the database matches the one entered

        //set session data
       $_SESSION["email"] = $email;
       $_SESSION["loggedIn"] = true;

       header("location:profile.php");//redirects to the profile page
       exit();
    }
  }else

  echo "Passwords do not match!!";//out put a message use bootstrap!!!!!!!!!!!!!!!!!!!!!!

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
  <title>Login</title>
</head>
<body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/check.js" type="text/javascript"></script>
  <div class="container-fluid" id="register">
    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-3">
        <div class="text-center">
          <img src="/MajorProject/images/FAW_logo.png" class="img-fluid" alt="FAWlogo" id="fawLogo1">
        </div>
        <div class="container-fluid" id="regContainer">
          <form name="regForm" method="post" action="loginTest.php">
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" type="email" name="email" id="email" placeholder="Email" maxlength="150" autocomplete="email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password" id="password" placeholder="Password" autocomplete="current-password">
            </div>
            <input type="submit" class="btn btn-primary" name="login" value="Login" id="login">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
