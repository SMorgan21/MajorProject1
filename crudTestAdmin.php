<?php

//Connects to database
include 'php/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"><!-- Bootstrap CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="/MajorProject/Css/styles.css" rel="stylesheet">
	<title>Crud Test</title>
</head>
<body>
	<!-- Bootstrap --><!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="http://code.jquery.com/jquery-3.3.1.js">
	</script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
	</script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
	</script> <!-- Start off CRUD design -->
	<?php 

    if (isset($_GET['rep'])){

      $id = $_GET['rep'];



      //Searches the database for all reports that match the report Id
      $rep = $dbcon->query("SELECT * FROM reports1 WHERE id = '$id'");

      $row = mysqli_fetch_assoc($rep);
      $league = $row['league'];
      $homeTeam = $row['homeTeam'];
      $awayTeam = $row['awayTeam'];
      $datePlayed = $row['datePlayed'];
      $location = $row['location'];
      //Group1
      $surname1 = $row['surname1'];
      $firstName1 = $row['firstName1'];
      $team1 = $row['team1'];
      $caution1 = $row['caution1'];
      $sendOff1 = $row['sendOff1'];
      //Group2
      $surname2 = $row['surname2'];
      $firstName2 = $row['firstName2'];
      $team2 = $row['team2'];
      $caution2 = $row['caution2'];
      $sendOff2 = $row['sendOff2'];
      //Group2
      $surname2 = $row['surname2'];
      $firstName2 = $row['firstName2'];
      $team2 = $row['team2'];
      $caution2 = $row['caution2'];
      $sendOff2 = $row['sendOff2'];
      //Group3
      $surname3 = $row['surname3'];
      $firstName3 = $row['firstName3'];
      $team3 = $row['team3'];
      $caution3 = $row['caution3'];
      $sendOff3 = $row['sendOff3'];
      //Group4
      $surname4 = $row['surname4'];
      $firstName4 = $row['firstName4'];
      $team4 = $row['team4'];
      $caution4 = $row['caution4'];
      $sendOff4 = $row['sendOff4'];
      //Group5
      $surname5 = $row['surname5'];
      $firstName5 = $row['firstName5'];
      $team5 = $row['team5'];
      $caution5 = $row['caution5'];
      $sendOff5 = $row['sendOff5'];
      //Group6
      $surname6 = $row['surname6'];
      $firstName6 = $row['firstName6'];
      $team6 = $row['team6'];
      $caution6 = $row['caution6'];
      $sendOff6 = $row['sendOff6'];
      //Group7
      $surname7 = $row['surname7'];
      $firstName7 = $row['firstName7'];
      $team7 = $row['team7'];
      $caution7 = $row['caution7'];
      $sendOff7 = $row['sendOff7'];
      
      
  ?>
     <?php include 'php/header.php'; ?> <!-- Navbar -->
   <?php include 'php/navBar.php'; ?> <!-- Title -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="text-center">
          <h4>Central Wales Football Association</h4><br>
          <h5>Official Match Report</h5><br>
        </div>
      </div>
    </div>
  </div><!-- End of Title -->
  <!-- Start of match Report -->
  <!-- First half of Report -->
  <form action="testUpdatePdf.php" id="reportEdit" method="post" name="reportEdit">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="text-center">
            <div class="container-fluid regContainer">
              <div class="form-row">
                <div class="input-group-preprend">
                  <label class="input-group-text" for="league">League</label>
                </div><select class="form-control" id="league" name="league">
                  <option value=""><?php echo $league;?>
                  </option><?php
                                    include 'php/connect.php';
                                    $data = mysqli_query($dbcon, "SELECT * FROM leagues");
                                    while ($row = $data->fetch_assoc()){
                                      echo "<option value=\"{$row['id']}\">{$row['leagueName']}</option>";
                                    }
                                    ?>
                </select>
              </div>
              <script charset="utf-8" src="js/teamAjax.js">
              </script>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="homeTeam">Home Team</label>
                  </div><select class="form-control teams" id="homeTeam" name="homeTeam">
                    <option value="">
                      <?php echo $homeTeam;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="awayTeam">Away Team</label>
                  </div><select class="form-control teams" id="awayTeam" name="awayTeam">
                    <option value="">
                      <?php echo $awayTeam;?>
                    </option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="location">Location</label>
                  </div><select class="form-control teams" id="location" name="location">
                    <option value="">
                      <?php echo $location;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="datePlayed">Match Date</label>
                  </div><input class="form-control" id="datePlayed" name="datePlayed" type="date" value="<?php echo $datePlayed;?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End of first half of Report -->
    <!-- Title for cautions -->
    <br>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="text-center">
            <h5>Name of offenders - Important: use same form for both clubs for cautions (up to TEN names)</h5><br>
            <h5>For send offs use only one name per form</h5><br>
          </div>
        </div>
      </div>
    </div><!-- End of title -->
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
                  </div><input class="form-control" id="surname1" maxlength="50" name="surname1" placeholder="Surname" value="<?php echo $surname1;?>" type="text">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName1">First Name</label>
                  </div><input class="form-control" id="firstName1" maxlength="50" name="firstName1" placeholder="First Name" value="<?php echo $surname1;?>" type="text">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team1">Team</label>
                  </div><select class="form-control teams" id="team1" name="team1">
                    <option value="">
                      <?php echo $team1;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution1">Caution</label>
                  </div><select class="form-control" id="caution1" name="caution1">
                    <option value="">
                      <?php echo $caution1;?>
                    </option>
                    <option value="C1">
                      C1
                    </option>
                    <option value="C2">
                      C2
                    </option>
                    <option value="C3">
                      C3
                    </option>
                    <option value="C4">
                      C4
                    </option>
                    <option value="C5">
                      C5
                    </option>
                    <option value="C6">
                      C6
                    </option>
                    <option value="C7">
                      C7
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff1">Send Off</label>
                  </div><select class="form-control" id="sendOff1" name="sendOff1">
                    <option value="">
                      <?php echo $sendOff1;?>
                    </option>
                    <option value="S1">
                      S1
                    </option>
                    <option value="S2">
                      S2
                    </option>
                    <option value="S3">
                      S3
                    </option>
                    <option value="S4">
                      S4
                    </option>
                    <option value="S5">
                      S5
                    </option>
                    <option value="S6">
                      S6
                    </option>
                    <option value="S7">
                      S7
                    </option>
                  </select>
                </div>
              </div><!-- End of first line -->
              <!-- Start of second line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname2">Surname</label>
                  </div><input class="form-control" id="surname2" maxlength="50" name="surname2" placeholder="Surname" value="<?php echo $surname2;?>" type="text">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName2">First Name</label>
                  </div><input class="form-control" id="firstName2" maxlength="50" name="firstName2" placeholder="First Name" value="<?php echo $firstName2;?>" type="text">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team2">Team</label>
                  </div><select class="form-control teams" id="team2" name="team2">
                    <option value="">
                      <?php echo $team2;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution2">Caution</label>
                  </div><select class="form-control" id="caution2" name="caution2">
                    <option value="">
                      <?php echo $caution2;?>
                    </option>
                    <option value="C1">
                      C1
                    </option>
                    <option value="C2">
                      C2
                    </option>
                    <option value="C3">
                      C3
                    </option>
                    <option value="C4">
                      C4
                    </option>
                    <option value="C5">
                      C5
                    </option>
                    <option value="C6">
                      C6
                    </option>
                    <option value="C7">
                      C7
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff2">Send Off</label>
                  </div><select class="form-control" id="sendOff2" name="sendOff2">
                    <option value="">
                      <?php echo $sendOff2;?>
                    </option>
                    <option value="S1">
                      S1
                    </option>
                    <option value="S2">
                      S2
                    </option>
                    <option value="S3">
                      S3
                    </option>
                    <option value="S4">
                      S4
                    </option>
                    <option value="S5">
                      S5
                    </option>
                    <option value="S6">
                      S6
                    </option>
                    <option value="S7">
                      S7
                    </option>
                  </select>
                </div>
              </div><!-- End of second line -->
              <!-- Start of third line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname3">Surname</label>
                  </div><input class="form-control" id="surname3" maxlength="50" name="surname3" placeholder="Surname" value="<?php echo $surname3;?>"" type="text">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName3">First Name</label>
                  </div><input class="form-control" id="firstName3" maxlength="50" name="firstName3" placeholder="First Name" value="<?php echo $firstName3;?>"" type="text">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team3">Team</label>
                  </div><select class="form-control teams" id="team3" name="team3">
                    <option value="">
                      <?php echo $team3;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution3">Caution</label>
                  </div><select class="form-control" id="caution3" name="caution3">
                    <option value="">
                      <?php echo $caution3;?>
                    </option>
                    <option value="C1">
                      C1
                    </option>
                    <option value="C2">
                      C2
                    </option>
                    <option value="C3">
                      C3
                    </option>
                    <option value="C4">
                      C4
                    </option>
                    <option value="C5">
                      C5
                    </option>
                    <option value="C6">
                      C6
                    </option>
                    <option value="C7">
                      C7
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff3">Send Off</label>
                  </div><select class="form-control" id="sendOff3" name="sendOff3">
                    <option value="">
                      <?php echo $sendOff3;?>
                    </option>
                    <option value="S1">
                      S1
                    </option>
                    <option value="S2">
                      S2
                    </option>
                    <option value="S3">
                      S3
                    </option>
                    <option value="S4">
                      S4
                    </option>
                    <option value="S5">
                      S5
                    </option>
                    <option value="S6">
                      S6
                    </option>
                    <option value="S7">
                      S7
                    </option>
                  </select>
                </div>
              </div><!-- End of third line -->
              <!-- Start of fourth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname4">Surname</label>
                  </div><input class="form-control" id="surname4" maxlength="50" name="surname4" placeholder="Surname" value="<?php echo $surname4;?>"" type="text">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName4">First Name</label>
                  </div><input class="form-control" id="firstName4" maxlength="50" name="firstName4" placeholder="First Name" value="<?php echo $firstName4;?>"" type="text">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team4">Team</label>
                  </div><select class="form-control teams" id="team4" name="team4">
                    <option value="">
                      <?php echo $team4;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution4">Caution</label>
                  </div><select class="form-control" id="caution4" name="caution4">
                    <option value="">
                      <?php echo $caution4;?>
                    </option>
                    <option value="C1">
                      C1
                    </option>
                    <option value="C2">
                      C2
                    </option>
                    <option value="C3">
                      C3
                    </option>
                    <option value="C4">
                      C4
                    </option>
                    <option value="C5">
                      C5
                    </option>
                    <option value="C6">
                      C6
                    </option>
                    <option value="C7">
                      C7
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff4">Send Off</label>
                  </div><select class="form-control" id="sendOff4" name="sendOff4">
                    <option value="">
                      <?php echo $sendOff4;?>
                    </option>
                    <option value="S1">
                      S1
                    </option>
                    <option value="S2">
                      S2
                    </option>
                    <option value="S3">
                      S3
                    </option>
                    <option value="S4">
                      S4
                    </option>
                    <option value="S5">
                      S5
                    </option>
                    <option value="S6">
                      S6
                    </option>
                    <option value="S7">
                      S7
                    </option>
                  </select>
                </div>
              </div><!-- End of fourth line -->
              <!-- Start of fifth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname5">Surname</label>
                  </div><input class="form-control" id="surname5" maxlength="50" name="surname5" placeholder="Surname" value="<?php echo $surname5;?>"" type="text">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName5">First Name</label>
                  </div><input class="form-control" id="firstName5" maxlength="50" name="firstName5" placeholder="First Name" value="<?php echo $firstName5;?>"" type="text">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team5">Team</label>
                  </div><select class="form-control teams" id="team5" name="team5">
                    <option value="">
                      <?php echo $team5;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution5">Caution</label>
                  </div><select class="form-control" id="caution5" name="caution5">
                    <option value="">
                      <?php echo $caution5;?>
                    </option>
                    <option value="C1">
                      C1
                    </option>
                    <option value="C2">
                      C2
                    </option>
                    <option value="C3">
                      C3
                    </option>
                    <option value="C4">
                      C4
                    </option>
                    <option value="C5">
                      C5
                    </option>
                    <option value="C6">
                      C6
                    </option>
                    <option value="C7">
                      C7
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff5">Send Off</label>
                  </div><select class="form-control" id="sendOff5" name="sendOff5">
                    <option value="">
                      <?php echo $sendOff5;?>
                    </option>
                    <option value="S1">
                      S1
                    </option>
                    <option value="S2">
                      S2
                    </option>
                    <option value="S3">
                      S3
                    </option>
                    <option value="S4">
                      S4
                    </option>
                    <option value="S5">
                      S5
                    </option>
                    <option value="S6">
                      S6
                    </option>
                    <option value="S7">
                      S7
                    </option>
                  </select>
                </div>
              </div><!-- End of fifth line -->
              <!-- Start of sixth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname6">Surname</label>
                  </div><input class="form-control" id="surname6" maxlength="50" name="surname6" placeholder="Surname" value="<?php echo $surname6;?>"" type="text">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName6">First Name</label>
                  </div><input class="form-control" id="firstName6" maxlength="50" name="firstName6" placeholder="First Name" <?php echo $firstName6;?>" type="text">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team6">Team</label>
                  </div><select class="form-control teams" id="team6" name="team6">
                    <option value="">
                      <?php echo $team6;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution6">Caution</label>
                  </div><select class="form-control" id="caution6" name="caution6">
                    <option value="">
                      <?php echo $caution6;?>
                    </option>
                    <option value="C1">
                      C1
                    </option>
                    <option value="C2">
                      C2
                    </option>
                    <option value="C3">
                      C3
                    </option>
                    <option value="C4">
                      C4
                    </option>
                    <option value="C5">
                      C5
                    </option>
                    <option value="C6">
                      C6
                    </option>
                    <option value="C7">
                      C7
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff6">Send Off</label>
                  </div><select class="form-control" id="sendOff6" name="sendOff6">
                    <option value="">
                      <?php echo $sendOff6;?>
                    </option>
                    <option value="S1">
                      S1
                    </option>
                    <option value="S2">
                      S2
                    </option>
                    <option value="S3">
                      S3
                    </option>
                    <option value="S4">
                      S4
                    </option>
                    <option value="S5">
                      S5
                    </option>
                    <option value="S6">
                      S6
                    </option>
                    <option value="S7">
                      S7
                    </option>
                  </select>
                </div>
              </div><!-- End of sixth line -->
              <!-- Start of seventh line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname7">Surname</label>
                  </div><input class="form-control" id="surname7" maxlength="50" name="surname7" placeholder="Surname" value="<?php echo $surname7;?>"" type="text">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName7">First Name</label>
                  </div><input class="form-control" id="firstName7" maxlength="50" name="firstName7" placeholder="First Name" value="<?php echo $firstName7;?>"" type="text">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team7">Team</label>
                  </div><select class="form-control teams" id="team7" name="team7">
                    <option value="">
                      <?php echo $team7;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution7">Caution</label>
                  </div><select class="form-control" id="caution7" name="caution7">
                    <option value="">
                     <?php echo $caution7;?>
                    </option>
                    <option value="C1">
                      C1
                    </option>
                    <option value="C2">
                      C2
                    </option>
                    <option value="C3">
                      C3
                    </option>
                    <option value="C4">
                      C4
                    </option>
                    <option value="C5">
                      C5
                    </option>
                    <option value="C6">
                      C6
                    </option>
                    <option value="C7">
                      C7
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="sendOff7">Send Off</label>
                  </div><select class="form-control" id="sendOff7" name="sendOff7">
                    <option value="">
                      <?php echo $sendOff7;?>
                    </option>
                    <option value="S1">
                      S1
                    </option>
                    <option value="S2">
                      S2
                    </option>
                    <option value="S3">
                      S3
                    </option>
                    <option value="S4">
                      S4
                    </option>
                    <option value="S5">
                      S5
                    </option>
                    <option value="S6">
                      S6
                    </option>
                    <option value="S7">
                      S7
                    </option>
                  </select>
                </div>
              </div><!-- A script to reset the inputs on the page, I have had to delay the function to allow time for the pdf to generate -->
              <script>
                       function resetForm() {
                         document.getElementById("matchReport").reset();
                         alert("Your report has been saved and emailed. Press o");
                       }
              </script> <input id="editMatchReport" name="editMatchReport" onclick="setTimeout(resetForm, 200)" type="submit" value="Save and Send">
            </div>
          </div>
        </div><!-- End of seventh line -->
        <!-- Start of Caution code list -->
        <div class="col-md-4">
          <div class="container-fluid regContainer">
            <div class="text-center">
              <h4>Caution Codes</h4>
            </div>
            <div class="text-left">
              <ul class="list-group cautions">
                <li class="list-group-item list-group-item-warning font-weight-bold">C1 Unsporting behaviour</li>
                <li class="list-group-item list-group-item-warning font-weight-bold">C2 Shows dissent by word or action</li>
                <li class="list-group-item list-group-item-warning font-weight-bold">C3 Persistently infringing the laws of the game</li>
                <li class="list-group-item list-group-item-warning font-weight-bold">C4 Delays the restart of play</li>
                <li class="list-group-item list-group-item-warning font-weight-bold">C5 Fails to respect the required distance when play is restarted with a corner or a free kick</li>
                <li class="list-group-item list-group-item-warning font-weight-bold">C6 Enteres or re-enteres the field of play without the referees permission</li>
                <li class="list-group-item list-group-item-warning font-weight-bold">C7 Deliberatley leaves the field of play without the referees permission</li>
              </ul>
            </div><br>
            <div class="text-center">
              <h4>Send Off Codes</h4>
            </div>
            <div class="text-left">
              <ul class="list-group sendOff">
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
        </div><!-- End of Caution code list -->
      </div>
    </div>
  </form><?php exit(); } ?>
	<div class="container-fluid" id="matchReportTableAdmin">
		<!-- Modal pop up to allow editing of matchreports -->
		<div class="row justify-content-center">
			<!-- Display Match Reports -->
			<div class="col-md-12">
				<h2>Admin Reports</h2>
				<div class="table-responsive">
					<table class="table table-dark table-striped table-bordered table-hover">
						<thead class="thead-dark">
							<tr>
								<th>Match Played</th>
								<th>League</th>
								<th>Home Team</th>
								<th>Away Team</th>
								<th>Refferee</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							//Searches the database for all messages that match the message Id
							$matchReportResults=$dbcon->query("SELECT * FROM reports1");

							$row=mysqli_fetch_assoc($matchReportResults);
							//limits the amount of messages per page
							$reportLimit=5; 
							//sets $page as a variable that contains an aray
							$page=$_GET['page']; 
							//queries the database for all the information stored in the messages table
							$reportResults=mysqli_num_rows($dbcon->query("SELECT * FROM reports1")); //Used to get the ammount of pages. I take the ammount of pages and then divide them by the reportLimit(5) and then round the answer up to an int
							$totalReports=ceil($reportResults/$reportLimit); //Page Logic
							if (!isset($page) || $page <=0) {
							$pageOffSet=0;
							}
							else {
							$pageOffSet=ceil($page - 1) * $reportLimit;
							} //Searches the database for all messages that match the message Id
							$matchReportResults=$dbcon->query("SELECT * FROM reports1  ORDER BY dateCreated DESC LIMIT $pageOffSet,$reportLimit");
							while ($row=mysqli_fetch_assoc($matchReportResults)) {
							$id = $row['id'];
							$datePlayed=$row['datePlayed'];
							$league=$row['league'];
							$homeTeam=$row['homeTeam'];
							$awayTeam=$row['awayTeam'];
							$reffUserName=$row['reffUserName'];
							// Displaying the results
							echo '<tr>';
							echo '<td><a href="?rep='.$id.'">'.$datePlayed.'</td>';
							echo '<td><a href="?rep='.$id.'">'.$league.'</td>';
							echo '<td><a href="?rep='.$id.'">'.$homeTeam.'</td>';
							echo '<td><a href="?rep='.$id.'">'.$awayTeam.'</td>';
							echo '<td><a href="?rep='.$id.'">'.$reffUserName.'</td>';
							echo '</tr>';
							}
							?>
						</tbody>
					</table><!-- Page number logic --><?php if($reportResults > $reportLimit) {
					echo '<div class="row">';
					echo '<div class="col-md-12">';
					echo '<div class="text-center pages">';
					for($i=1;
					$i <=$totalReports;
					$i++) {
					echo($i==$page) ? '<a class="active">'.$i.'</a>': '<a href="?page='.$i.'">'.$i.'</a>';
					}
					echo'</div>';
					echo'</div>';
					echo'</div>';
					}
					?><!-- End of page number logic -->

				</div>
			</div>
		</div>
	</div>
</body>
</html>