<?php
//Starting Session
session_start();


if (isset($_POST['submitMatchReport'])) {

include 'php/connect.php';//connection details
$league = mysqli_real_escape_string($dbcon, $_POST['league']);
$homeTeam = mysqli_real_escape_string($dbcon,$_POST['homeTeam']);
$awayTeam = mysqli_real_escape_string($dbcon,$_POST['awayTeam']);
$datePlayed = mysqli_real_escape_string($dbcon,$_POST['datePlayed']);
$location = mysqli_real_escape_string($dbcon,$_POST['location']);
$surname1 = mysqli_real_escape_string($dbcon,$_POST['surname1']);
$firstName1 = mysqli_real_escape_string($dbcon,$_POST['firstName1']);
$caution1 = mysqli_real_escape_string($dbcon,$_POST['caution1']);
$team1 = mysqli_real_escape_string($dbcon,$_POST['team1']);
$sendOff1 = mysqli_real_escape_string($dbcon,$_POST['sendOff1']);
$surname2 = mysqli_real_escape_string($dbcon,$_POST['surname2']);
$firstName2 = mysqli_real_escape_string($dbcon,$_POST['firstName2']);
$caution2 = mysqli_real_escape_string($dbcon,$_POST['caution2']);
$team2 = mysqli_real_escape_string($dbcon,$_POST['team2']);
$sendOff2 = mysqli_real_escape_string($dbcon,$_POST['sendOff2']);
$surname3 = mysqli_real_escape_string($dbcon,$_POST['surname3']);
$firstName3 = mysqli_real_escape_string($dbcon,$_POST['firstName3']);
$caution3 = mysqli_real_escape_string($dbcon,$_POST['caution3']);
$team3 = mysqli_real_escape_string($dbcon,$_POST['team3']);
$sendOff3 = mysqli_real_escape_string($dbcon,$_POST['sendOff3']);
$surname4 = mysqli_real_escape_string($dbcon,$_POST['surname4']);
$firstName4 = mysqli_real_escape_string($dbcon,$_POST['firstName4']);
$caution4 = mysqli_real_escape_string($dbcon,$_POST['caution4']);
$team4 = mysqli_real_escape_string($dbcon,$_POST['team4']);
$sendOff4 = mysqli_real_escape_string($dbcon,$_POST['sendOff4']);
$surname5 = mysqli_real_escape_string($dbcon,$_POST['surname5']);
$firstName5 = mysqli_real_escape_string($dbcon,$_POST['firstName5']);
$caution5 = mysqli_real_escape_string($dbcon,$_POST['caution5']);
$team5 = mysqli_real_escape_string($dbcon,$_POST['team5']);
$sendOff5 = mysqli_real_escape_string($dbcon,$_POST['sendOff5']);
$surname6 = mysqli_real_escape_string($dbcon,$_POST['surname6']);
$firstName6 = mysqli_real_escape_string($dbcon,$_POST['firstName6']);
$caution6 = mysqli_real_escape_string($dbcon,$_POST['caution6']);
$team6 = mysqli_real_escape_string($dbcon,$_POST['team6']);
$sendOff6 = mysqli_real_escape_string($dbcon,$_POST['sendOff6']);
$surname7 = mysqli_real_escape_string($dbcon,$_POST['surname7']);
$firstName7 = mysqli_real_escape_string($dbcon,$_POST['firstName7']);
$caution7 = mysqli_real_escape_string($dbcon,$_POST['caution7']);
$team7 = mysqli_real_escape_string($dbcon,$_POST['team7']);
$sendOff7 = mysqli_real_escape_string($dbcon,$_POST['sendOff7']);



//Query
$data = $dbcon->query("INSERT INTO reports (league, homeTeam, awayTeam, datePlayed, location, surname1, firstName1, team1, caution1, sendOff1,
 surname2, firstName2, team2, caution2, sendOff2,
 surname3, firstName3, team3, caution3, sendOff3,
 surname4, firstName4, team4, caution4, sendOff4,
 surname5, firstName5, team5, caution5, sendOff5,
 surname6, firstName6, team6, caution6, sendOff6,
 surname7, firstName7, team7, caution7, sendOff7)
 VALUES
 ('$league', '$homeTeam', '$awayTeam', '$datePlayed', '$location',
 '$surname1', '$irstName1', '$team1', '$caution1', '$sendOff1',
 '$surname2, '$firstName2', '$team2', '$caution2', '$sendOff2',
 '$surname3', '$firstName3', '$team3', '$caution3', '$sendOff3',
 '$surname4', '$firstName4', '$team4', '$caution4', '$sendOff4,
 '$surname5', '$firstName5', '$team5', '$caution5', '$sendOff5',
 '$surname6', '$firstName6', '$team6', '$caution6', '$sendOff6',
 '$surname7', '$firstName7', '$team7', '$caution7', '$sendOff7' )");
echo $league ."<br>"; 
echo $homeTeam ."<br>";
echo $awayTeam ."<br>";
echo $datePlayed ."<br>";
echo $location ."<br>";

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
  <title>Match Report</title>
</head>
<body>
  <!-- Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Header -->
  <?php include 'php/header.php'; ?>

  <!-- Navbar -->
  <?php include 'php/navBar.php'; ?>


  <!-- Title -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="text-center">
          <h4>Central Wales Football Association</h4>
          <br>
          <h5>Official Match Report</h5>
          <br>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Title -->

  <!-- Start of match Report -->
  <!-- First half of Report -->
  <form class="matchReport" action="matchReport.php" method="post">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="text-center">
            <div class="container-fluid regContainer">
              <div class="form-row">
                <div class="input-group-preprend">
                  <label class="input-group-text" for="league">League</label>
                </div>
                <select class="form-control" name="league" id="league" required>
                  <option value="">Please Select an Option</option>
                  <?php
                  include 'php/connect.php';
                  $data = mysqli_query($dbcon, "SELECT * FROM leagues");
                  while ($row = $data->mysqli_fetch_assoc()){
                    echo "<option value=\"{$row['leagueName']}\">{$row['leagueName']}</option>";
                  }
                  ?>
                </select>
              </div>
              <script src="js/teamAjax.js" charset="utf-8"></script>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="homeTeam">Home Team</label>
                  </div>
                  <select class="form-control teams" name="homeTeam" id="homeTeam" required>
                    <option value="">Please Select A Team</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="awayTeam">Away Team</label>
                  </div>
                  <select class="form-control teams" name="awayTeam" id="awayTeam" required>
                    <option value="">Please Select A Team</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="datePlayed">Match Date</label>
                  </div>
                  <input class="form-control" type="date" name="datePlayed" id="datePlayed" required>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="location">Location</label>
                  </div>
                  <select class="form-control teams" name="location" id="location" required>
                    <option value="">Please Select A Location</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End of first half of Report -->

    <!-- Title for cautions -->
    <br>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="text-center">
            <h5>Name of offenders - Important: use same form for both clubs for cautions (up to TEN names)</h5>
            <br>
            <h5>For send offs use only one name per form</h5>
            <br>
          </div>
        </div>
      </div>
    </div>
    <!-- End of title -->

    <!-- Start of second Half of form -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="text-center">
            <div class="container-fluid regContainer">
              <!-- Start of first line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname1">Surname</label>
                  </div>
                  <input class="form-control" type="text" name="surname1" id="surname1" placeholder="Surname" minlength="1" maxlength="50" required>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName1">First Name</label>
                  </div>
                  <input class="form-control" type="text" name="firstName1" id="firstName1" placeholder="First Name" minlength="1" maxlength="50" required>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team1">Team</label>
                  </div>
                  <select class="form-control teams" name="team1" id="team1" required>
                    <option value="">Please Select A Team</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution1">Caution</label>
                  </div>
                  <select class="form-control" name="caution1" id="caution1">
                    <option value="">Please Select A Caution Code</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="C4">C4</option>
                    <option value="C5">C5</option>
                    <option value="C6">C6</option>
                    <option value="C7">C7</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff1">Send Off</label>
                  </div>
                  <select class="form-control" name="sendOff1" id="sendOff1">
                    <option value="">Please Select A Send Off Code</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="S4">S4</option>
                    <option value="S5">S5</option>
                    <option value="S6">S6</option>
                    <option value="S7">S7</option>
                  </select>

                </div>
              </div>
              <!-- End of first line -->
              <!-- Start of second line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname2">Surname</label>
                  </div>
                  <input class="form-control" type="text" name="surname2" id="surname2" placeholder="Surname" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName2">First Name</label>
                  </div>
                  <input class="form-control" type="text" name="firstName2" id="firstName2" placeholder="First Name" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team2">Team</label>
                  </div>
                  <select class="form-control teams" name="team2" id="team2">
                    <option value="">Please Select A Team</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution2">Caution</label>
                  </div>
                  <select class="form-control" name="caution2" id="caution2">
                    <option value="">Please Select A Caution Code</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="C4">C4</option>
                    <option value="C5">C5</option>
                    <option value="C6">C6</option>
                    <option value="C7">C7</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff2">Send Off</label>
                  </div>
                  <select class="form-control" name="sendOff2" id="sendOff2">
                    <option value="">Please Select A Send Off Code</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="S4">S4</option>
                    <option value="S5">S5</option>
                    <option value="S6">S6</option>
                    <option value="S7">S7</option>
                  </select>

                </div>
              </div>
              <!-- End of second line -->
              <!-- Start of third line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname3">Surname</label>
                  </div>
                  <input class="form-control" type="text" name="surname3" id="surname3" placeholder="Surname" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName3">First Name</label>
                  </div>
                  <input class="form-control" type="text" name="firstName3" id="firstName3" placeholder="First Name" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team3">Team</label>
                  </div>
                  <select class="form-control teams" name="team3" id="team3">
                    <option value="">Please Select A Team</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution3">Caution</label>
                  </div>
                  <select class="form-control" name="caution3" id="caution3">
                    <option value="">Please Select A Caution Code</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="C4">C4</option>
                    <option value="C5">C5</option>
                    <option value="C6">C6</option>
                    <option value="C7">C7</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff3">Send Off</label>
                  </div>
                  <select class="form-control" name="sendOff3" id="sendOff3">
                    <option value="">Please Select A Send Off Code</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="S4">S4</option>
                    <option value="S5">S5</option>
                    <option value="S6">S6</option>
                    <option value="S7">S7</option>
                  </select>

                </div>
              </div>
              <!-- End of third line -->
              <!-- Start of fourth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname4">Surname</label>
                  </div>
                  <input class="form-control" type="text" name="surname4" id="surname4" placeholder="Surname" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName4">First Name</label>
                  </div>
                  <input class="form-control" type="text" name="firstName4" id="firstName4" placeholder="First Name" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team4">Team</label>
                  </div>
                  <select class="form-control teams" name="team4" id="team4">
                    <option value="">Please Select A Team</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution4">Caution</label>
                  </div>
                  <select class="form-control" name="caution4" id="caution4">
                    <option value="">Please Select A Caution Code</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="C4">C4</option>
                    <option value="C5">C5</option>
                    <option value="C6">C6</option>
                    <option value="C7">C7</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff4">Send Off</label>
                  </div>
                  <select class="form-control" name="sendOff4" id="sendOff4">
                    <option value="">Please Select A Send Off Code</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="S4">S4</option>
                    <option value="S5">S5</option>
                    <option value="S6">S6</option>
                    <option value="S7">S7</option>
                  </select>

                </div>
              </div>
              <!-- End of fourth line -->
              <!-- Start of fifth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname5">Surname</label>
                  </div>
                  <input class="form-control" type="text" name="surname5" id="surname5" placeholder="Surname" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName5">First Name</label>
                  </div>
                  <input class="form-control" type="text" name="firstName5" id="firstName5" placeholder="First Name" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team5">Team</label>
                  </div>
                  <select class="form-control teams" name="team5" id="team5">
                    <option value="">Please Select A Team</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution5">Caution</label>
                  </div>
                  <select class="form-control" name="caution5" id="caution5">
                    <option value="">Please Select A Caution Code</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="C4">C4</option>
                    <option value="C5">C5</option>
                    <option value="C6">C6</option>
                    <option value="C7">C7</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff5">Send Off</label>
                  </div>
                  <select class="form-control" name="sendOff5" id="sendOff5">
                    <option value="">Please Select A Send Off Code</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="S4">S4</option>
                    <option value="S5">S5</option>
                    <option value="S6">S6</option>
                    <option value="S7">S7</option>
                  </select>

                </div>
              </div>
              <!-- End of fifth line -->
              <!-- Start of sixth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname6">Surname</label>
                  </div>
                  <input class="form-control" type="text" name="surname6" id="surname6" placeholder="Surname" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName6">First Name</label>
                  </div>
                  <input class="form-control" type="text" name="firstName6" id="firstName6" placeholder="First Name" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team6">Team</label>
                  </div>
                  <select class="form-control teams" name="team6" id="team6">
                    <option value="">Please Select A Team</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution6">Caution</label>
                  </div>
                  <select class="form-control" name="caution6" id="caution6">
                    <option value="">Please Select A Caution Code</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="C4">C4</option>
                    <option value="C5">C5</option>
                    <option value="C6">C6</option>
                    <option value="C7">C7</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff6">Send Off</label>
                  </div>
                  <select class="form-control" name="sendOff6" id="sendOff6">
                    <option value="">Please Select A Send Off Code</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="S4">S4</option>
                    <option value="S5">S5</option>
                    <option value="S6">S6</option>
                    <option value="S7">S7</option>
                  </select>

                </div>
              </div>
              <!-- End of sixth line -->
              <!-- Start of seventh line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname7">Surname</label>
                  </div>
                  <input class="form-control" type="text" name="surname7" id="surname7" placeholder="Surname" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName7">First Name</label>
                  </div>
                  <input class="form-control" type="text" name="firstName7" id="firstName7" placeholder="First Name" minlength="1" maxlength="50">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team7">Team</label>
                  </div>
                  <select class="form-control teams" name="team7" id="team7">
                    <option value="">Please Select A Team</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution7">Caution</label>
                  </div>
                  <select class="form-control" name="caution7" id="caution7">
                    <option value="">Please Select A Caution Code</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="C4">C4</option>
                    <option value="C5">C5</option>
                    <option value="C6">C6</option>
                    <option value="C7">C7</option>
                  </select>

                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff7">Send Off</label>
                  </div>
                  <select class="form-control" name="sendOff7" id="sendOff7">
                    <option value="">Please Select A Send Off Code</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="S4">S4</option>
                    <option value="S5">S5</option>
                    <option value="S6">S6</option>
                    <option value="S7">S7</option>
                  </select>
                </div>
              </div>
              <!-- End of seventh line -->
            </div>
          </div>
        </div>

      <!-- End of Match Report -->

      <!-- Start of Caution code list -->
      <div class="col-md-4">
        <div class="container-fluid regContainer">
          <div class="text-center">
            <h4>Caution Codes</h4>
          </div>
          <div class="text-left">
            <ul class="list-group cautions" name"cautions">
              <li class="list-group-item list-group-item-warning font-weight-bold">C1  Unsporting behaviour</li>
              <li class="list-group-item list-group-item-warning font-weight-bold">C2  Shows dissent by word or action</li>
              <li class="list-group-item list-group-item-warning font-weight-bold">C3  Persistently infringing the laws of the game</li>
              <li class="list-group-item list-group-item-warning font-weight-bold">C4  Delays the restart of play</li>
              <li class="list-group-item list-group-item-warning font-weight-bold">C5  Fails to respect the required distance when play is restarted with a corner or a free kick</li>
              <li class="list-group-item list-group-item-warning font-weight-bold">C6  Enteres or re-enteres the field of play without the referees permission</li>
              <li class="list-group-item list-group-item-warning font-weight-bold">C7  Deliberatley leaves the field of play without the referees permission</li>
            </ul>
          </div>
          <br>
          <div class="text-center">
            <h4>Send Off Codes</h4>
          </div>
          <div class="text-left">
            <ul class="list-group sendOff" name"sendOff">
              <li class="list-group-item list-group-item-danger font-weight-bold">S1 Foul play</li>
              <li class="list-group-item list-group-item-danger font-weight-bold">S2 Violent conduct</li>
              <li class="list-group-item list-group-item-danger font-weight-bold">S3 Spits at an opponent or other person</li>
              <li class="list-group-item list-group-item-danger font-weight-bold">S4 Dennies a goal scoring opportunity</li>
              <li class="list-group-item list-group-item-danger font-weight-bold">S5 Denying the scoring of a goal e.g Hand ball on the line</li>
              <li class="list-group-item list-group-item-danger font-weight-bold">S6 Using offensive or abusive language</li>
              <li class="list-group-item list-group-item-danger font-weight-bold">S7 Recieves second caution in the same game</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- End of Caution code list -->
    </div>
  </div>





</body>
</html>
