<?php

session_start();//Starting Session
require "php/loginCheckAdmin.php";
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
  <title>Admin Profile Page</title>
</head>
<body>
  <!-- Bootstrap --><!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js">
  </script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
  </script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
  </script>
    <script src='js/timeOut.js'>
  </script>
  <!-- modal scripts -->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#addTeam").on('click', function (){
        $("#addTeamModal").modal('show');
      });
    });
  </script>

  <!-- End Modal Scripts -->
   <!-- Header -->
  <?php include 'php/headerAdmin.php'; ?> <!-- Navbar -->
  <?php include 'php/navBarAdmin.php'; ?> <?php 

  if (isset($_GET['rep'])){

  $id = $_GET['rep'];



  //Searches the database for all reports that match the report Id
  $reportQuery = $dbcon->query("SELECT * FROM reports1 WHERE id = '$id'");

  $row = mysqli_fetch_assoc($reportQuery);
  $repId = $row['id'];
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
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="text-center">
          <h2>Central Wales Football Association</h2><br>
          <h3>Official Match Report <strong class="edit">Editing Page</strong></h3><br>
        </div>
      </div>
    </div>
  </div><!-- End of Title -->
  <!-- Start of match Report -->
  <!-- First half of Report -->
  <form action="updatePdf.php" id="reportEdit" method="post" name="reportEdit">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="text-center">
            <div class="container-fluid regContainer">
              <div class="form-row">
                <input class="form-control" hidden="" id="repId" name="repId" type="text" value="<?php echo $repId;?>">
              </div>
              <div class="form-row">
                <div class="input-group-preprend">
                  <label class="input-group-text" for="league">League</label>
                </div><select class="form-control" id="changeLeague" name="league">
                  <option value="<?php echo $league;?>">
                    <?php echo $league;?>
                  </option>
                  <?php
                  include 'php/connect.php';
                  $data = mysqli_query($dbcon, "SELECT * FROM leagues");
                  while ($row = $data->fetch_assoc()){
                    echo "<option value=\"{$row['id']}\">{$row['leagueName']}</option>";
                  }
                  ?>
                </select>
              </div>
              <script charset="utf-8" src="js/teamAjaxAdmin.js">
              </script>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="homeTeam">Home Team</label>
                  </div><select class="form-control teams" id="changeHomeTeam" name="homeTeam">
                    <option value="<?php echo $homeTeam;?>">
                      <?php echo $homeTeam;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="awayTeam">Away Team</label>
                  </div><select class="form-control teams" id="changeAwayTeam" name="awayTeam">
                    <option value="<?php echo $awayTeam;?>">
                      <?php echo $awayTeam;?>
                    </option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="location">Location</label>
                  </div><select class="form-control teams" id="changeLocation" name="location">
                    <option value="<?php echo $location;?>">
                      <?php echo $location;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="datePlayed">Match Date</label>
                  </div><input class="form-control" id="changeDatePlayed" name="datePlayed" type="date" value="<?php echo $datePlayed;?>">
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
            <h3>Name of offenders - Important: use same form for both clubs for cautions (up to SEVEN names)</h3><br>
            <h3>For send offs use only one name per form</h3><br>
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
                  </div><input class="form-control" id="changeSurname1" maxlength="50" name="surname1" placeholder="Surname" type="text" value="<?php echo $surname1;?>">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName1">First Name</label>
                  </div><input class="form-control" id="changeFirstName1" maxlength="50" name="firstName1" placeholder="First Name" type="text" value="<?php echo $surname1;?>">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team1">Team</label>
                  </div><select class="form-control teams" id="changeTeam1" name="team1">
                    <option value="<?php echo $team1;?>">
                      <?php echo $team1;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution1">Caution</label>
                  </div><select class="form-control" id="changeCaution1" name="caution1">
                    <option value="<?php echo $caution1;?>">
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
                  </div><select class="form-control" id="changeSendOff1" name="sendOff1">
                    <option value="<?php echo $sendOff1;?>">
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
                  </div><input class="form-control" id="changeSurname2" maxlength="50" name="surname2" placeholder="Surname" type="text" value="<?php echo $surname2;?>">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName2">First Name</label>
                  </div><input class="form-control" id="changeFirstName2" maxlength="50" name="firstName2" placeholder="First Name" type="text" value="<?php echo $firstName2;?>">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team2">Team</label>
                  </div><select class="form-control teams" id="changeTeam2" name="team2">
                    <option value="<?php echo $team2;?>">
                      <?php echo $team2;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution2">Caution</label>
                  </div><select class="form-control" id="changeCaution2" name="caution2">
                    <option value="<?php echo $caution2;?>">
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
              </div><!-- End of second line -->
              <!-- Start of third line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname3">Surname</label>
                  </div><input class="form-control" id="changeSurname3" maxlength="50" name="surname3" placeholder="Surname" type="text" value="<?php echo $surname3;?>">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName3">First Name</label>
                  </div><input class="form-control" id="changeFirstName3" maxlength="50" name="firstName3" placeholder="First Name" type="text" value="<?php echo $firstName3;?>">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team3">Team</label>
                  </div><select class="form-control teams" id="changeTeam3" name="team3">
                    <option value="<?php echo $team3;?>">
                      <?php echo $team3;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution3">Caution</label>
                  </div><select class="form-control" id="changeCaution3" name="caution3">
                    <option value="<?php echo $caution3;?>">
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
              </div><!-- End of third line -->
              <!-- Start of fourth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname4">Surname</label>
                  </div><input class="form-control" id="changeSurname4" maxlength="50" name="surname4" placeholder="Surname" type="text" value="<?php echo $surname4;?>">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName4">First Name</label>
                  </div><input class="form-control" id="changeFirstName4" maxlength="50" name="firstName4" placeholder="First Name" type="text" value="<?php echo $firstName4;?>">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team4">Team</label>
                  </div><select class="form-control teams" id="changeTeam4" name="team4">
                    <option value="<?php echo $team4;?>">
                      <?php echo $team4;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution4">Caution</label>
                  </div><select class="form-control" id="changeCaution4" name="caution4">
                    <option value="<?php echo $caution4;?>">
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
              </div><!-- End of fourth line -->
              <!-- Start of fifth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname5">Surname</label>
                  </div><input class="form-control" id="changeSurname5" maxlength="50" name="surname5" placeholder="Surname" type="text" value="<?php echo $surname5;?>">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName5">First Name</label>
                  </div><input class="form-control" id="changeFirstName5" maxlength="50" name="firstName5" placeholder="First Name" type="text" value="<?php echo $firstName5;?>">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team5">Team</label>
                  </div><select class="form-control teams" id="changeTeam5" name="team5">
                    <option value="<?php echo $team5;?>">
                      <?php echo $team5;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution5">Caution</label>
                  </div><select class="form-control" id="changeCaution5" name="caution5">
                    <option value="<?php echo $caution5;?>">
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
              </div><!-- End of fifth line -->
              <!-- Start of sixth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname6">Surname</label>
                  </div><input class="form-control" id="changeSurname6" maxlength="50" name="surname6" placeholder="Surname" type="text" value="<?php echo $surname6;?>">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName6">First Name</label>
                  </div><input class="form-control" id="changeFirstName6" maxlength="50" name="firstName6" placeholder="First Name" type="text" value="<?php echo $firstName6;?>">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team6">Team</label>
                  </div><select class="form-control teams" id="changeTeam6" name="team6">
                    <option value="<?php echo $team6;?>">
                      <?php echo $team6;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution6">Caution</label>
                  </div><select class="form-control" id="changeCaution6" name="caution6">
                    <option value="<?php echo $caution6;?>">
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
              </div><!-- End of sixth line -->
              <!-- Start of seventh line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname7">Surname</label>
                  </div><input class="form-control" id="changeSurname7" maxlength="50" name="surname7" placeholder="Surname" type="text" value="<?php echo $surname7;?>">
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName7">First Name</label>
                  </div><input class="form-control" id="changeFirstName7" maxlength="50" name="firstName7" placeholder="First Name" type="text" value="<?php echo $firstName7;?>">
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team7">Team</label>
                  </div><select class="form-control teams" id="changeTeam7" name="team7">
                    <option value="<?php echo $team7;?>">
                      <?php echo $team7;?>
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution7">Caution</label>
                  </div><select class="form-control" id="changeCaution7" name="caution7">
                    <option value="<?php echo $caution7;?>">
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
              </div><!-- A script to reset the inputs on the page, I have had to delay the function to allow time for the pdf to generate -->
              <script>
              function savedAlert() {
              alert("The report has been saved");

              }
              </script> <input id="editMatchReport" class="btn btn-primary" name="editMatchReport" onclick="savedAlert()" type="submit" value="Save Report">
            </div>
          </div>
        </div><!-- End of seventh line -->
        <!-- Start of Caution code list -->
        <div class="col-md-4">
          <div class="container-fluid cautionContainer">
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
  <!-- Edit Leagues -->
  <?php 

  if (isset($_GET['editLeague'])){

  $Id = $_GET['editLeague'];

  $teams = $dbcon->query("SELECT * FROM teams WHERE leagueFK = '$Id' ORDER BY teamName");
  $league = $dbcon->query("SELECT * FROM leagues WHERE id = '$Id' ORDER BY leagueName");

 

  ?>

  <div class="container-fluid">
    <!-- add Team modal -->
    <div class="modal fade" id="addTeamModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form name="addTeamForm" id="addTeamForm" action="addTeamModal.php" method="POST">
        <div class="modal-header">
          <h2 class="modal-title" id="addTeamTitle">Add a team</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
          <div class="input-group-preprend">
            <label class="input-group-text" for="addTeamName">Add Team Name</label>
          </div>
          <input class="form-control" type="text" name="addTeamName" placeholder="Team Name......" id="addTeamName">
        </div><br>
        <div class="form-row">
          <input class="form-control" type="text" name="addTeamId" value="<?php echo "$Id"; ?>" hidden>  
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
          <input class="btn btn-success" type="submit" name="saveTeam" id="saveTeam" value="Save Team">
        </div>
        </form>
           </div>
        </div>
      </div>      
    </div>

    <!-- end add Team modal -->
    <div class="row justify-content-center">
      <div class="regContainer">
        <div class="col-md-12">
          <div class="text-center">
            <h2 class="title" id="editLeagueTitle">Edit League</h2>
          </div><br>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Team</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row=mysqli_fetch_assoc($teams)) {
                $teamName = $row['teamName'];
                $teamId = $row['id']; 
                echo '
                <tr>
                <td>'.$teamName.'</td>
                <td> <a class="btn btn-danger" role="button" onclick="return deleteConfirmAlert();" title="Click here to delete this team" href="?deleteTeam='.$teamId.'">Delete this Team</a></td>
                </tr>';
                }
                ?>
              </tbody>
              <script type="text/javascript">
                function deleteConfirmAlert()
                {
                  var conf = confirm("Are you sure you want to delete this team?");
                  if (conf)
                    return true;
                  else
                    return false;
                }
              </script>
            </table>
          </div>
          <div class="text-center">
            <input class="btn btn-success" type="button" title="Click here to add a team to this league" value="Add A Team" role="button" id="addTeam">
            <a class="btn btn-primary" href="profileAdmin.php" title="Click here to return to the home page" role="button">Back Home Page</a><br><br>   
              <!--    while ($rowLeague=mysqli_fetch_assoc($league)) {
                $leagueId = $rowLeague['id']; 
               
                echo '
                <div class="text-center">
                <a class="btn btn-danger" role="button" href="?deleteLeague='.$leagueId.'">Delete this league</a>
                 </div>';
                 -->
          </div>
        </div>
      </div>
    </div>
  </div> <?php exit(); } ?> 
<!-- Delete Team -->
  <?php 

  if (isset($_GET['deleteTeam'])) {
      $teamDelete = $_GET['deleteTeam'];

      //Removes all messages with the message Id set above
      $delete = $dbcon->query("DELETE FROM teams WHERE id = '$teamDelete'");
      if ($delete) {
          header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit; //Redirects back a page page
      }else {
           echo'
  <div class="container-fluid">
  <div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
  <div class="container-fluid regContainer">
  <div class="text-center">
  <p>Unfortunatly something went wrong</p>
  <a href="profileAdmin.php" class="btn btn-primary">Click here to try again</a>
  </div>
  </div>
  </div>
  </div>
  </div>';


 // If the delete request does not work this message will apear 
      }
      exit();
  }

  ?>
  <!-- End Of Delete Team -->
  <!-- Delete League -->
  <?php 

  if (isset($_GET['deleteLeague'])) {
      $leagueDelete = $_GET['deleteLeague'];

      //Removes all messages with the message Id set above
      $removeLeague = $dbcon->query("DELETE FROM leagues WHERE id = '$leagueDelete'");
      if ($removeLeague) {
     echo'
  <div class="container-fluid">
  <div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
  <div class="container-fluid regContainer">
  <div class="text-center">
  <p>The League has been removed</p>
  <a href="profileAdmin.php" class="btn btn-primary">Click here to continue</a>
  </div>
  </div>
  </div>
  </div>
  </div>';
          
            exit;
      }else {
           echo $leagueDelete;
           echo'
  <div class="container-fluid">
  <div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
  <div class="container-fluid regContainer">
  <div class="text-center">
  <p>Unfortunatly something went wrong</p>
  <a href="profileAdmin.php" class="btn btn-primary">Click here to try again</a>
  </div>
  </div>
  </div>
  </div>
  </div>';

      }
      exit();
  }

  ?> 
  <!-- End of Delete League -->
   <!-- End Of Edit Leagues -->
  <div class="container-fluid regContainer col-md-9" id="matchReportTableAdmin">
    <div class="row justify-content-center">
      <!-- Display Match Reports -->
      <div class="col-md-12 ">
        <div class="text-center">
        <h2>Admin Reports</h2>
        <P>To edit a report click on one of the rows bellow</P>
        </div><br>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Match Played</th>
                <th scope="col">League</th>
                <th scope="col">Home Team</th>
                <th scope="col">Away Team</th>
                <th scope="col">Refferee</th>
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
  </div><br> <!-- Leagues -->
  <div class="container-fluid regContainer col-md-5" id="editLeagues">
    <div class="row justify-content-center">
      <!-- Display Match Reports -->
      <div class="col-md-12">
        <div class="text-center">
        <h2>Leagues and Competitions</h2>
        <p>Choose a legue form the dropdown menu and then click on any team to edit the league</p>
      </div><br>
        <div class="form-row">
          <div class="input-group-preprend">
            <label class="input-group-text" for="leagueEdit">League</label>
          </div><select class="form-control" id="leagueEdit" name="leagueEdit">
            <option value="">
              Please Select a League
            </option><?php
                include 'php/connect.php';
                $data = mysqli_query($dbcon, "SELECT * FROM leagues");
                while ($row = $data->fetch_assoc()){
                  echo "<option value=\"{$row['id']}\">{$row['leagueName']}</option>";
                }
                ?>
          </select>
        </div>
        <div class="table-responsive">
          <script charset="utf-8" src="js/editTeamAjax.js">
          </script>
          <table class="table-sm table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Teams</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class='editTeams'></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-center">
        <input class="btn btn-primary" type="button" title="Click here to add a new league or competition" value="Add a new League or Competition" role="button" id="addLeague">
      </div>
      </div>
    </div>
        <!-- Add League Modal -->
    <script type="text/javascript">
    $(document).ready(function(){
      $("#addLeague").on('click', function (){
        $("#addLeagueModal").modal('show');
      });
    });
  </script>

<div class="modal fade" id="addLeagueModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form action="addNewLeague.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLeagueTitle">Add a new League or Competition</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="input-group-preprend">
            <label class="input-group-text" for="leagueName">League/Competition Name</label>
          </div>
          <input class="form-control" id="leagueName" name="leagueName" type="text" minlength="3" required>
          <div class="input-group-preprend">
            <label class="input-group-text" for="newTeam1">First New Team</label>
          </div>
          <input class="form-control" id="newTeam1" name="newTeam1" type="text" minlength="3" required>
        <div class="input-group-preprend">
            <label class="input-group-text" for="newTeam2">Second New Team</label>
          </div>
          <input class="form-control" id="newTeam2" name="newTeam2" type="text" minlength="3" required>
          <br>
          <div class="row">
        <div class="text-center">
          <small>Each League/Competition must have a minimum of TWO teams. To add more teams please select the league on the home screen and click on one of the teams</small>
        </div>
        </div>
        </div> 
        
      <div class="modal-footer">
  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input class="btn btn-success" type="submit" name="saveLeague" value="Save New League/Competition">

      </div>
      </div>
      </form>
    </div>
     
  </div>
</div><br>
  <!-- end of leagues -->
  <!-- Update user details -->
   <div class="container-fluid regContainer col-md-10" id="updateDetails">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="text-center">
        <h2>Update Details</h2>
        <p>The boxes display your current details, if you would like to change anything, click in the corrosponding box and enter your new details. Once you have input your details click on the Update Details button</p>
        </div><br>
        <?php
        $currentDetails = $dbcon->query("SELECT * from refDetails where email = '".$_SESSION['email']."'");
        $reffResults = mysqli_fetch_assoc($currentDetails);
        $reffId = $reffResults["id"];{
        echo '
        <form action="upDateRefDetailsAdmin.php" method="POST"

        <div class="form-row">
        <div class="form-group col-md-6">
        <div class="input-group-preprend">
        <label class="input-group-text" for="gender">Gender</label>
        </div>   
        <select class="form-control" name="gender" id="gender">
        <option value="'.$reffResults['gender'].'">'.$reffResults['gender'].'
        </option>
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
        <option value="'.$reffResults['grade'].'">'.$reffResults['grade'].'
        </option>
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
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="input-group-preprend">
              <label class="input-group-text" for="telephoneNo">Telephone Number</label>
            </div>
            <input class="form-control" type="text" name="telephoneNo" id="telephoneNo" placeholder="01234567890" value="'.$reffResults['telephoneNo'].'"  minlength="11" maxlength="11" autocomplete="mobile">
          </div>
        <div class="form-group col-md-6">
        <div class="input-group-preprend">
        <label class="input-group-text" for="email">Email</label>
        </div>
        <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="'.$reffResults['email'].'" autocomplete="email">
        <div class="form-group" id="emailFeedBack">
        </div>
        </div>
        </div>
        <div class="text-center">
        <input class="btn btn-primary" type="submit" name="updateDetailsRef" value="Update Details" onclick="updateSuccesfull()">
        <a class="btn btn-primary" title="Click here to change your password" href="changePasswordAdmin.php">Change Password</a>
        </div>
        </form>
        <script type="text/javascript">
        function updateSuccesfull(){
          alert("Your details have been saved. Press OK to continue");
        }
        </script>
        </div>
          </div>
        </div>';

                } 

        ?>
      </div>
    </div>
  </div>
</body>
</html>