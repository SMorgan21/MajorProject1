<?php
//Starting Session
session_start();
//Checks that the user is logged in 
require "php/loginCheck.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"><!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="/MajorProject/Css/styles.css" rel="stylesheet">
  <title>Match Report</title>
</head>
<body>
  <!-- Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js">
  </script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
  </script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
  </script>
  <!-- Header -->
   <?php include 'php/header.php'; ?> <!-- Navbar -->
   <?php include 'php/navBar.php'; ?> <!-- Title -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="text-center">
          <h2>Central Wales Football Association</h2>
          <h3>Official Match Report</h3><br>
        </div>
      </div>
    </div>
  </div><!-- End of Title -->
  <!-- Start of match Report -->
  <!-- First half of Report -->
  <form action="matchReportPdf.php" id="matchReport" method="post" name="matchReport">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="text-center">
            <div class="container-fluid regContainer">
              <div class="form-row">
                <div class="input-group-preprend">
                  <label class="input-group-text" for="league">League</label>
                </div><select class="form-control" id="league" name="league" required>
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
              <script charset="utf-8" src="js/teamAjax.js">
              </script><br>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="homeTeam">Home Team</label>
                  </div><select class="form-control teams selectedTeams" id="homeTeam" name="homeTeam" required>
                    <option value="">
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="awayTeam">Away Team</label>
                  </div><select class="form-control teams selectedTeams" id="awayTeam" name="awayTeam" required>
                    <option value="">
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <!-- This script disables the first team selected so that th user cant select the first team twice -->
                <script type="text/javascript">
                  $(".selectedTeams").change(function () {
                  $("select option").prop("disabled", false);
                  $(".selectedTeams").not($(this)).find("option[value='" + $(this).val() + "']").prop("disabled", true);
                });
                </script>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="location">Location</label>
                  </div><select class="form-control teams" id="location" name="location" required>
                    <option value="">
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="datePlayed">Match Date</label>
                  </div><input class="form-control" id="datePlayed" name="datePlayed" type="date" required>
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
            <h3>Name of offenders - Important: use same form for both clubs for cautions (up to SEVEN names)</h3>
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
                  </div><input class="form-control" id="surname1" maxlength="50" name="surname1" placeholder="Surname" type="text" required>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName1">First Name</label>
                  </div><input class="form-control" id="firstName1" maxlength="50" name="firstName1" placeholder="First Name" type="text" required>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team1">Team</label>
                  </div><select class="form-control teams" id="team1" name="team1" required>
                    <option value="">
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution1">Caution</label>
                  </div><select class="form-control caution" id="caution1" name="caution">
                    <option value="">
                      Please Select A Caution Code
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
                  </div>
                  <select class="form-control sendOff" id="sendOff1" name="sendOff">
                    <option value="">
                      Please Select A Send Off Code
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
                  <input class="btn btn-warning btn-sm" type="button" title="Click to reset the caution you have chosen" name="resetSelect" value="Reset Cautions" id="reset1">
                  <!-- This script stops the user from selecting both the send off and the caution options. if a caution is selected then the send off is dissabled and vice versa-->
                  <script type="text/javascript">
                    $(function() {
                      $("#caution1").change(function() {
                        $("#sendOff1").prop("disabled", true);
                      });
                      $("#sendOff1").change(function() {
                        $("#caution1").prop("disabled", true);
                      });
                    });
                    // this part of the script resets the above code incase the user selects the wrong box by accident
                  $("#reset1").click(function() {
                  $('#sendOff1').prop('selectedIndex', 0);
                  $('#caution1').prop('selectedIndex', 0);
                  $("#sendOff1").prop("disabled", false);
                  $("#caution1").prop("disabled", false);
                  $("#surname2").prop("disabled", true);
                  $("#firstName2").prop("disabled", true);
                  $("#team2").prop("disabled", true);
                  $("#caution2").prop("disabled", true);
                  $("#sendOff2").prop("disabled", true);
                  $("#reset2").prop("disabled", true);
                  })
                  caution1.onchange = function(e) {
                    surname2.disabled = (caution1.value == "0");
                    firstName2.disabled = (caution1.value == "0");
                    team2.disabled = (caution1.value == "0");
                    caution2.disabled = (caution1.value == "0");
                    sendOff2.disabled = (caution1.value == "0");
                    reset2.disabled = (caution1.value == "0");
                  };
                  sendOff1.onchange = function(e) {
                    surname2.disabled = (sendOff1.value == "0");
                    firstName2.disabled = (sendOff1.value == "0");
                    team2.disabled = (sendOff1.value == "0");
                    caution2.disabled = (sendOff1.value == "0");
                    sendOff2.disabled = (sendOff1.value == "0");
                    reset2.disabled = (sendOff1.value == "0");
                  };      
                </script>
                </div>
              </div><!-- End of first line -->
              <!-- Start of second line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname2">Surname</label>
                  </div><input class="form-control" id="surname2" maxlength="50" name="surname2" placeholder="Surname" type="text" disabled>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName2">First Name</label>
                  </div><input class="form-control" id="firstName2" maxlength="50" name="firstName2" placeholder="First Name" type="text" disabled>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team2">Team</label>
                  </div><select class="form-control teams" id="team2" name="team2" disabled>
                    <option value="0" selected>
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution2">Caution</label>
                  </div><select class="form-control caution" id="caution2" name="caution" disabled>
                    <option value="0" selected>
                      Please Select A Caution Code
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
                  </div><select class="form-control sendOff" id="sendOff2" name="sendOff" disabled>
                    <option value="0" selected>
                      Please Select A Send Off Code
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
                      <input class="btn btn-warning btn-sm" type="button" name="resetSelect" title="Click to reset the caution you have chosen" value="Reset Cautions" id="reset2" disabled>
                  <script type="text/javascript">
                     $(function() {
                      $("#caution2").change(function() {
                        $("#sendOff2").prop("disabled", true);
                      });
                      $("#sendOff2").change(function() {
                        $("#caution2").prop("disabled", true);
                      });
                    });
                  $("#reset2").click(function() {
                  $('#sendOff2').prop('selectedIndex', 0);
                  $('#caution2').prop('selectedIndex', 0);
                  $("#sendOff2").prop("disabled", false);
                  $("#caution2").prop("disabled", false);
                  $("#surname3").prop("disabled", true);
                  $("#firstName3").prop("disabled", true);
                  $("#team3").prop("disabled", true);
                  $("#caution3").prop("disabled", true);
                  $("#sendOff3").prop("disabled", true);
                  $("#reset3").prop("disabled", true);
                  };    
                </script>
                </div>
              </div><!-- End of second line -->
              <!-- Start of third line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname3">Surname</label>
                  </div><input class="form-control" id="surname3" maxlength="50" name="surname3" placeholder="Surname" type="text" disabled>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName3">First Name</label>
                  </div><input class="form-control" id="firstName3" maxlength="50" name="firstName3" placeholder="First Name" type="text" disabled>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team3">Team</label>
                  </div><select class="form-control teams" id="team3" name="team3" disabled>
                    <option value="0" selected>
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution3">Caution</label>
                  </div><select class="form-control caution" id="caution3" name="caution" disabled>
                    <option value="0" selected>
                      Please Select A Caution Code
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
                  </div><select class="form-control sendOff" id="sendOff3" name="sendOff" disabled>
                    <option value="0" selected>
                      Please Select A Send Off Code
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
                      <input class="btn btn-warning btn-sm" type="button" name="resetSelect" title="Click to reset the caution you have chosen" value="Reset Cautions" id="reset3" disabled>
                  <script type="text/javascript">
                     $(function() {
                      $("#caution3").change(function() {
                        $("#sendOff3").prop("disabled", true);
                      });
                      $("#sendOff3").change(function() {
                        $("#caution3").prop("disabled", true);
                      });
                    });
                  $("#reset3").click(function() {
                  $('#sendOff3').prop('selectedIndex', 0);
                  $('#caution3').prop('selectedIndex', 0);
                  $("#sendOff3").prop("disabled", false);
                  $("#caution3").prop("disabled", false);
                  });
                </script>
                </div>
              </div><!-- End of third line -->
              <!-- Start of fourth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname4">Surname</label>
                  </div><input class="form-control" id="surname4" maxlength="50" name="surname4" placeholder="Surname" type="text" disabled>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName4">First Name</label>
                  </div><input class="form-control" id="firstName4" maxlength="50" name="firstName4" placeholder="First Name" type="text" disabled>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team4">Team</label>
                  </div><select class="form-control teams" id="team4" name="team4" disabled>
                    <option value="0" selected>
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution4">Caution</label>
                  </div><select class="form-control caution" id="caution4" name="caution" disabled>
                    <option value="0" selected>
                      Please Select A Caution Code
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
                  </div><select class="form-control sendOff" id="sendOff4" name="sendOff" disabled>
                    <option value="0" selected>
                      Please Select A Send Off Code
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
                  </select>    <input class="btn btn-warning btn-sm" type="button" name="resetSelect" title="Click to reset the caution you have chosen" value="Reset Cautions" id="reset4" disabled>
                  <script type="text/javascript">
                     $(function() {
                      $("#caution4").change(function() {
                        $("#sendOff4").prop("disabled", true);
                      });
                      $("#sendOff4").change(function() {
                        $("#caution4").prop("disabled", true);
                      });
                    });
                  $("#reset4").click(function() {
                  $('#sendOff4').prop('selectedIndex', 0);
                  $('#caution4').prop('selectedIndex', 0);
                  $("#sendOff4").prop("disabled", false);
                  $("#caution4").prop("disabled", false);
                  });
                </script>
                </div>
              </div><!-- End of fourth line -->
              <!-- Start of fifth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname5">Surname</label>
                  </div><input class="form-control" id="surname5" maxlength="50" name="surname5" placeholder="Surname" type="text" disabled>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName5">First Name</label>
                  </div><input class="form-control" id="firstName5" maxlength="50" name="firstName5" placeholder="First Name" type="text" disabled>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team5">Team</label>
                  </div><select class="form-control teams" id="team5" name="team5" disabled>
                    <option value="0" selected>
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution5">Caution</label>
                  </div><select class="form-control caution" id="caution5" name="caution" disabled>
                    <option value="0" selected>
                      Please Select A Caution Code
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
                  </div><select class="form-control sendOff" id="sendOff5" name="sendOff" disabled>
                    <option value="0" selected>
                      Please Select A Send Off Code
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
                  </select>    <input class="btn btn-warning btn-sm" type="button" name="resetSelect" title="Click to reset the caution you have chosen" value="Reset Cautions" id="reset5" disabled>
                  <script type="text/javascript">
                     $(function() {
                      $("#caution5").change(function() {
                        $("#sendOff5").prop("disabled", true);
                      });
                      $("#sendOff5").change(function() {
                        $("#caution5").prop("disabled", true);
                      });
                    });
                  $("#reset5").click(function() {
                  $('#sendOff5').prop('selectedIndex', 0);
                  $('#caution5').prop('selectedIndex', 0);
                  $("#sendOff5").prop("disabled", false);
                  $("#caution5").prop("disabled", false);
                  });
                </script>
                </div>
              </div><!-- End of fifth line -->
              <!-- Start of sixth line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname6">Surname</label>
                  </div><input class="form-control" id="surname6" maxlength="50" name="surname6" placeholder="Surname" type="text" disabled>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName6">First Name</label>
                  </div><input class="form-control" id="firstName6" maxlength="50" name="firstName6" placeholder="First Name" type="text" disabled>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team6">Team</label>
                  </div><select class="form-control teams" id="team6" name="team6" disabled>
                    <option value="0" selected>
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution6">Caution</label>
                  </div><select class="form-control caution" id="caution6" name="caution" disabled>
                    <option value="0" selected>
                      Please Select A Caution Code
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
                  </div><select class="form-control sendOff" id="sendOff6" name="sendOff" disabled>
                    <option value="0" selected>
                      Please Select A Send Off Code
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
                  </select>    <input class="btn btn-warning btn-sm" type="button" name="resetSelect" title="Click to reset the caution you have chosen" value="Reset Cautions" id="reset6" disabled>
                  <script type="text/javascript">
                     $(function() {
                      $("#caution6").change(function() {
                        $("#sendOff6").prop("disabled", true);
                      });
                      $("#sendOff6").change(function() {
                        $("#caution6").prop("disabled", true);
                      });
                    });
                  $("#reset6").click(function() {
                  $('#sendOff6').prop('selectedIndex', 0);
                  $('#caution6').prop('selectedIndex', 0);
                  $("#sendOff6").prop("disabled", false);
                  $("#caution6").prop("disabled", false);
                  });
                </script>
                </div>
              </div><!-- End of sixth line -->
              <!-- Start of seventh line -->
              <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname7">Surname</label>
                  </div><input class="form-control" id="surname7" maxlength="50" name="surname7" placeholder="Surname" type="text" disabled>
                </div>
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="firstName7">First Name</label>
                  </div><input class="form-control" id="firstName7" maxlength="50" name="firstName7" placeholder="First Name" type="text" disabled>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="team7">Team</label>
                  </div><select class="form-control teams" id="team7" name="team7" disabled>
                    <option value="0" selected>
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution7">Caution</label>
                  </div><select class="form-control" id="caution7" name="caution" disabled>
                    <option vvalue="0" selected>
                      Please Select A Caution Code
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
                  </div><select class="form-control" id="sendOff7" name="sendOff" disabled>
                    <option value="0" selected>
                      Please Select A Send Off Code
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
                  </select>    <input class="btn btn-warning btn-sm" type="button" name="resetSelect" title="Click to reset the caution you have chosen" value="Reset Cautions" id="reset7" disabled>
                  <script type="text/javascript">
                     $(function() {
                      $("#caution7").change(function() {
                        $("#sendOff7").prop("disabled", true);
                      });
                      $("#sendOff7").change(function() {
                        $("#caution7").prop("disabled", true);
                      });
                    });
                  $("#reset7").click(function() {
                  $('#sendOff7').prop('selectedIndex', 0);
                  $('#caution7').prop('selectedIndex', 0);
                  $("#sendOff7").prop("disabled", false);
                  $("#caution7").prop("disabled", false);
                  });
                </script>
                </div>
              </div><!-- A script to reset the inputs on the page, I have had to delay the function to allow time for the pdf to generate -->
              <script>
                       function resetForm() {
                         document.getElementById("matchReport").reset();
                         alert("Your report has been saved and emailed. Press OK to continue");
                       }
              </script> <input class="btn btn-success" id="submitMatchReport" name="submitMatchReport" onclick="setTimeout(resetForm, 200)" type="submit" value="Save Report">
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
  </form>
</body>
</html>