<?php

session_start();//Starting Session
//require "php/loginCheck.php";
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
  <title>Home</title>
</head>
<body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- header -->
<div class="container-fluid header">
  <div class="container-fluid headerInfo">
    <div class="row justify-content-md-center">
      <div class="col-md-3">
        <img src="images/FAW_logoSml.png" class="headerLogo" alt="FAW_logoSml"></a>
      </div>
      <div class="col-md-6 text-center" id="pageTitle">
        <h1>CWFA Referee Home Page</h1>
      </div>
      <div class="col-md-3 headerRightText" id="headerRight">
        <table class="table table-responsive" id="infoTable">
          <tbody>
            <tr>
              <td class="align-middle">
                  <span id="headerUsername">Username:</span>
              </td>
            </tr>
            <tr>
              <td class="align-middle">
                <div id="date">
                  <?php echo date("l d/m/Y");?>
                </div>
              </td>
            </tr>
            <tr>
              <td class="align-middle">
                <div id="time">
                  <?php echo date("h:i:sa"); ?>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
    <!-- Navbar -->
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Button that appears if the screen size is reduced -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbarText">
          <!-- Alligns Content to the right -->
          <ul class="navbar-nav nav-fill w-100">
            <!-- highlights the active link -->
            <li class="nav-item active">
              <a class="nav-link" href="profile.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Match Report</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Messages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Links</a>
            </li>
          </ul>
        </div>
        </div>
        <!-- End of Navbar -->
      </nav>
      <!-- End of header -->
      </div>

</body>
</html>
