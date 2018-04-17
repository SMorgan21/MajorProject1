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
<body>
<div class="form-group col-md-2">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="caution1">Caution</label>
                  </div><select class="form-control caution" id="caution1" name="caution">
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
                    <label class="input-group-text" for="sendOff1">Send Off</label>
                  </div>
                  <select class="form-control sendOff" id="sendOff1" name="sendOff">
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
                  })
                </script>
                </div>
   <div class="form-row">
                <div class="form-group col-md-3">
                  <div class="input-group-preprend">
                    <label class="input-group-text" for="surname2">Surname</label>
                  </div><input class="form-control" id="surname2" maxlength="50" name="surname2" placeholder="Surname" type="text" disabled>
                </div>
                <script type="text/javascript">
                  var caution1 = document.getElementById("caution1")
                  var sendOff1 = document.getElementById("sendOff1")
                  var surname2 = document.getElementById("surname2");
                  caution1.onchange = function(e) {
                    surname2.disabled = (caution1.value == "0");
                  };
                  sendOff1.onchange = function(e) {
                    surname2.disabled = (sendOff1.value == "0");
                  };    

                </script>



<!-- 
<script type="text/javascript">
   $(document).ready(function() {
 
  $('#caution1').change(function() {
    if( $('#caution1').val() !== C2 || C1) {
          $('#surname2').prop( "disabled", true);
    } else {       
      $('#surname2').prop( "disabled", false  );
    }
  });
 
});
</script> -->
</body>
</html>