<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/MajorProject/Css/styles.css">
    <!-- Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Dissapera</title>
</head>
<body> <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution1">Caution</label>
                  </div><select class="form-control caution" id="caution1" name="caution1">
                    <option value="" selected>
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
                  <select class="form-control sendOff" id="sendOff1" name="sendOff1">
                    <option value="" selected>
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
                    surname2.disabled = (caution1.value == "");
                    firstName2.disabled = (caution1.value == "");
                    team2.disabled = (caution1.value == "");
                    caution2.disabled = (caution1.value == "");
                    sendOff2.disabled = (caution1.value == "");
                    reset2.disabled = (caution1.value == "");
                  };
                  sendOff1.onchange = function(e) {
                    surname2.disabled = (sendOff1.value == "");
                    firstName2.disabled = (sendOff1.value == "");
                    team2.disabled = (sendOff1.value == "");
                    caution2.disabled = (sendOff1.value == "");
                    sendOff2.disabled = (sendOff1.value == "");
                    reset2.disabled = (sendOff1.value == "");
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
                    <option value="" selected>
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution2">Caution</label>
                  </div><select class="form-control caution" id="caution2" name="caution2" disabled>
                    <option value="" selected>
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
                  </div><select class="form-control sendOff" id="sendOff2" name="sendOff2" disabled>
                    <option value="" selected>
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
                  }); 
                  caution2.onchange = function(e) {
                    surname3.disabled = (caution2.value == "");
                    firstName3.disabled = (caution2.value == "");
                    team3.disabled = (caution2.value == "");
                    caution3.disabled = (caution2.value == "");
                    sendOff3.disabled = (caution2.value == "");
                    reset3.disabled = (caution2.value == "");
                  };
                  sendOff2.onchange = function(e) {
                    surname3.disabled = (sendOff2.value == "");
                    firstName3.disabled = (sendOff2.value == "");
                    team3.disabled = (sendOff2.value == "");
                    caution3.disabled = (sendOff2.value == "");
                    sendOff3.disabled = (sendOff2.value == "");
                    reset3.disabled = (sendOff2.value == "");
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
                    <option value="" selected>
                      Please Select A Team
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution3">Caution</label>
                  </div><select class="form-control caution" id="caution3" name="caution3" disabled>
                    <option value="" selected>
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
                  </div><select class="form-control sendOff" id="sendOff3" name="sendOff3" disabled>
                    <option value="" selected>
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
                  $("#surname4").prop("disabled", true);
                  $("#firstName4").prop("disabled", true);
                  $("#team4").prop("disabled", true);
                  $("#caution4").prop("disabled", true);
                  $("#sendOff4").prop("disabled", true);
                  $("#reset4").prop("disabled", true);
                  }); 
                  caution3.onchange = function(e) {
                    surname4.disabled = (caution3.value == "");
                    firstName4.disabled = (caution3.value == "");
                    team4.disabled = (caution3.value == "");
                    caution4.disabled = (caution3.value == "");
                    sendOff4.disabled = (caution3.value == "");
                    reset4.disabled = (caution3.value == "");
                  };
                  sendOff3.onchange = function(e) {
                    surname4.disabled = (sendOff3.value == "");
                    firstName4.disabled = (sendOff3.value == "");
                    team4.disabled = (sendOff3.value == "");
                    caution4.disabled = (sendOff3.value == "");
                    sendOff4.disabled = (sendOff3.value == "");
                    reset4.disabled = (sendOff3.value == "");
                  };         
                </script>
</body>
</html>