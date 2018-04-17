<?php
//Starting Session
session_start();

//Redirects a logged in user back to their profile page
if (isset($_SESSION["email"]) && isset ($_SESSION["loggedIn"])) {
  header("location: profile.php");
};

if (isset($_POST['login'])) {//listening for the login button
  require 'php/connect.php';//includes the database connection information
  $email = mysqli_real_escape_string($dbcon,$_POST['email']);
  $emailClean = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
  $password = mysqli_real_escape_string($dbcon,$_POST['password']);
  $passwordClean = filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $data = $dbcon->query("SELECT password, userLevel, id FROM refDetails WHERE email='$emailClean'");//executes a query to the database which selects an id and password that matches the email entered
  if (mysqli_num_rows($data) > 0) {//if a the number of matches are greater than 0
    $passData = mysqli_fetch_assoc($data);//puts the data from the databass into an array and then into a variable
    if (password_verify($passwordClean, $passData['password'])) {//if the password in the database matches the one entered

      //set session data
      $_SESSION["email"] = $email;
      $_SESSION["loggedIn"] = true;
      $_SESSION['userLevel'] = $passData['userLevel'];

      //checks the user level of the user
      if ($passData['userLevel'] == "admin") {
        header("location:profileAdmin.php");//redirects to the admin profile page
      }else{
        header("location:profile.php");//redirects to the referee profile page
      }


      exit();
    }
  }
  else{

    $message = '<div class="alert alert-danger">Sorry your details were not recognised, please check and re-enter, or if you do not have an account click on the button at the bottom of the page to register</div>';
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
  <title>Login</title>
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
          <img src="/MajorProject/images/FAW_logo.png" class="img-fluid fawLogo" alt="FAWlogo">
        </div>
        <div class="container-fluid regContainer">
          <form name="regForm" method="post" action="login.php">
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" type="email" name="email" id="email" placeholder="Email" maxlength="150" autocomplete="email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password" id="password" placeholder="Password" autocomplete="current-password">
              <div class="form-group">
                <?php echo $message; ?>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="login" value="Login" id="login">
            <a href="registration.php" class="btn btn-primary btn-block" role="button"  id="register">Register</a>
            <a href="forgotPassword.php" class="btn btn-primary btn-block" role="button"  id="forgotPassword">Request new password</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
