<?php
//Starting Session
session_start();

//Redirects a logged in user back to their profile page
if (isset($_SESSION["email"]) && isset ($_SESSION["loggedIn"])) {
  header("location: profile.php");
};
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
  <!-- checks for input in the username input and displays a message -->
  <script src="js/checkUsername.js" type="text/javascript"></script>
  <!-- checks for input in the email input and displays a message -->
  <script src="js/checkEmail.js" type="text/javascript"></script>
  <!-- checks for input in the refereeNumber input and displays a message -->
  <script src="js/checkRefnumber.js" type="text/javascript"></script>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-3">
        <div class="text-center">
          <img src="/MajorProject/images/FAW_logo.png" class="img-fluid fawLogo" alt="FAWlogo">
        </div>
        <form name="regForm" method="post" action="registrationLogin.php">
          <div class="container-fluid regContainer">
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group-preprend">
                <label class="input-group-text" for="firstName">First Name</label>
              </div>
                <input class="form-control" type="text" name="firstName" id="firstName" placeholder="Given Name" minlength="2" maxlength="50" autocomplete="given-name" required>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group-preprend">
                <label class="input-group-text" for="secondName">Surname</label>
              </div>
                <input class="form-control" type="text" name="secondName" id="secondName" placeholder="Surname" maxlength="50" autocomplete="family-name" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group-preprend">
                  <label class="input-group-text" for="gender">Gender</label>
                </div>
                <select class="form-control" name="gender" id="gender">
                  <option selected>Please Select an Option</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group-preprend">
                  <label class="input-group-text" for="grade">Grade</label>
                </div>
                <select class="form-control" name="grade" id="grade">
                  <option selected>Please Select a Grade</option>
                  <option value="1A">1A</option>
                  <option value="1B">1B</option>
                  <option value="F">F</option>
                  <option value="F-1A">F-1A</option>
                  <option value="F-1B">F-1B</option>
                  <option value="2">2</option>
                  <option value="F-2A">F-2A</option>
                  <option value="F-2B">F-2B</option>
                  <option value="3A">3A</option>
                  <option value="3B">3B</option>
                  <option value="4A">4A</option>
                  <option value="4B">4B</option>
                  <option value="4C">4C</option>
                  <option value="4D">4D</option>
                  <option value="4E">4E</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group-preprend">
                <label class="input-group-text" for="telephoneNo">Telephone Number</label>
              </div>
                <input class="form-control" type="text" name="telephoneNo" id="telephoneNo" placeholder="07123456789" minlength="11" maxlength="11" autocomplete="mobile" required>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group-preprend">
                <label class="input-group-text" for="refereeNumber">Referee Number</label>
              </div>
                <input class="form-control" type="text" name="refereeNumber" id="refereeNumber" placeholder="1234" minlength="4" maxlength="4" required>
                <div class="form-group" id="refereeNumberFeedBack">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group-preprend">
                <label class="input-group-text" for="userName">User Name</label>
              </div>
              <input class="form-control" type="text" name="userName" id="userName" placeholder="User Name" minlength="4" required>
              <div class="form-group" id="feedBack">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group-preprend">
                <label class="input-group-text" for="email">Email</label>
              </div>
              <input class="form-control" type="email" name="email" id="email" placeholder="Email" autocomplete="email" required>
              <div class="form-group" id="emailFeedBack">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group-preprend">
                <label class="input-group-text" for="password">Password</label>
              </div>
                <input class="form-control" type="password" name="password" id="password" minlength="8" maxlength="20" autocomplete="new-password">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Your password must be 8-20 characters long</small>
                </div>
                <script src="js/passwordCheck.js" type="text/javascript"></script>
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                <label class="input-group-text" for="conPassword">Confirm Password</label>
              </div>
                  <input class="form-control" type="password" name="conPassword" id="conPassword"><div class="alert alert-danger hidden" id="noMatch" role="alert"><strong>Your Passwords don't match,</strong> try again</div><div class="alert alert-success hidden" id="match" role="alert"><strong>Well done!</strong> You passwords match</div>
                </div>
              </div>
              <input type="submit" class="btn btn-primary btn-block" name="registration" value="Register" id="registration">
              <a href="login.php" class="btn btn-primary btn-block" role="button" name="login" id="login">Already have an account? click here to login</a>
            </form>
          </div>
        </div>
      </div>
    </body>
    </html>
