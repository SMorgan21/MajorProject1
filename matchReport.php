<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/MajorProject/Css/styles.css">
  <title>Match Report</title>
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
          <img src="images/FAW_logoSml.png" class="img-fluid headerLogo" alt="FAW_logoSml">
        </div>
        <div class="col-md-6 text-center" id="pageTitle">
          <h1>CWFA Referee Home Page</h1>
        </div>
        <div class="col-md-3 headerRightText" id="headerRight">
          <table class="table table-responsive" id="infoTable">
            <tbody>
              <tr>
                <td class="align-middle">
                  <!-- Displays the Username of whomever is logged in -->
                  <span id="headerUsername">Username:</span>
                </td>
              </tr>
              <tr>
                <!-- Displays the day of the week followed by the date -->
                <td class="align-middle">
                  <div id="date">
                    <?php echo date("l d/m/Y");?>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="align-middle">
                  <!-- Displays time -->
                  <div id="time">
                    <?php echo date("h:i:sa"); ?>
                    <br>
                    <a href="logoutTest.php">Log Out</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- End of header -->
  </div>
  <!-- Navbar -->
  <div class="container-fluid">
    <div class="container-fluid nBar">
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
        <!-- End of Navbar -->
      </nav>
    </div>
  </div>

  <!-- Title -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="text-center">
          <h1>Central Wales Football Association</h1>
          <br>
          <h2>Official Match Report</h2>
          <br>
        </div>
      </div>
    </div>
    <!-- End of Title -->
  </div>

  <!-- Start of match Report -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="text-center">
          <form class="matchReport" action="matchReport.php" method="post">
            <div class="container-fluid regContainer">
              <div class="form-row">
                <div class="input-group-preprend">
                  <label class="input-group-text" for="league">League</label>
                </div>
                <select class="form-control" name="league" id="league">
                  <option selected>Please Select an Option</option>

                  <?php
                  include 'php/connectLeague.php';
                  $data = mysqli_query($dbcon, "SELECT * FROM leagues");
                  while ($row = $data->fetch_assoc()){
                    echo "<option value=\"{$row['leagueName']}\">{$row['leagueName']}</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


</body>
</html>
