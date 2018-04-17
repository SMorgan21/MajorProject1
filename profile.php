<?php

session_start();//Starting Session
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
  <title>Referee Home Page</title>
</head>
<body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js">
  </script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
  </script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
  </script> <!-- Inactivity logout -->
  <script src='js/timeOut.js'>
  </script> <!-- Header -->
  <?php include 'php/header.php'; ?> <!-- Navbar -->
  <?php include 'php/navBar.php'; ?>
  <?php 

  $sql = $dbcon->query("SELECT * from refDetails where email = '".$_SESSION['email']."'");
  $reffResults = mysqli_fetch_assoc($sql);
  $reffId = $reffResults['id'];
  $reffUserName = $reffResults['reffUserName'];

  //Searches the database for all match reports that match the message Id
  $matchReportResults = $dbcon->query("SELECT * FROM reports1 WHERE reffFK = '$reffId'");
  $row = mysqli_fetch_assoc($matchReportResults); 

  ?> <!-- Display Match Reports  -->
  <div class="container-fluid regContainer col-md-10" id="matchReportTable">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="text-center">
        <h2>Completed Match Reports</h2>
      </div><br>
      <div class="container-fluid">
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

              $sql = $dbcon->query("SELECT id from refDetails where email = '".$_SESSION['email']."'");
              $reffResults = mysqli_fetch_assoc($sql);
              $reffId = $reffResults['id'];

              //limits the amount of messages per page
              $reportLimit = 10;

              //sets $page as a variable that contains an aray
              $page = $_GET['page'];

              //queries the database for all the information stored in the messages table
              $reportResults = mysqli_num_rows($dbcon->query("SELECT * FROM reports1 WHERE reffFK = '$reffId'"));

              //Used to get the ammount of pages. I take the ammount of pages and then divide them by the reportLimit(5) and then round the answer up to an int
              $totalReports = ceil($reportResults/$reportLimit);

              //Page Logic
              if (!isset($page) || $page <= 0) {
              $pageOffSet = 0;
              }else {
              $pageOffSet = ceil($page - 1) * $reportLimit;
              }

              //Searches the database for all messages that match the message Id
              $matchReportResults = $dbcon->query("SELECT * FROM reports1 WHERE reffFK = '$reffId' ORDER BY datePlayed DESC LIMIT $pageOffSet,$reportLimit");

              while ($row = mysqli_fetch_assoc($matchReportResults)){
              $datePlayed = $row['datePlayed'];
              $league = $row['league'];
              $homeTeam = $row['homeTeam'];
              $awayTeam = $row['awayTeam'];
              $reffUserName = $row['reffUserName'];



              echo '<tr>';
              echo '<td>'.$datePlayed.'</td>';
              echo '<td>'.$league.'</td>';
              echo '<td>'.$homeTeam.'</td>';
              echo '<td>'.$awayTeam.'</td>';
              echo '<td>'.$reffUserName.'</td>';
              echo '</tr>';
              }
              ?>
            </tbody>
          </table><!-- Page number logic -->
          <?php
          if($reportResults > $reportLimit){


          echo '<div class="row">';
          echo '<div class="col-md-12">';
          echo '<div class="text-center pages">';
          for($i = 1; $i <= $totalReports; $i++){
          echo($i == $page) ? '<a class="active">'.$i.'</a>' : '<a href="?page='.$i.'">'.$i.'</a>'; 
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
  </div><br>
  <!-- Update user details -->
  <div class="container-fluid regContainer col-md-10" id="updateDetails">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="text-center">
        <h2>Update Details</h2><br>
        <p>The boxes bellow display your current details. If you would like to change anything, click on the corrosponding box and enter the change and then click on the Update Details button to save your changes</p>
      </div><br>
        <?php 
        if (isset($_POST['update'])) {
        $gender = mysqli_real_escape_string($dbcon,$_POST['gender']);
        $grade = mysqli_real_escape_string($dbcon,$_POST['grade']);
        $gradeClean = filter_var($grade, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $email = mysqli_real_escape_string($dbcon,$_POST['email']);
        $emailClean = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
        $telephoneNo = mysqli_real_escape_string($dbcon,$_POST['telephoneNo']);
        $telephoneNoClean = filter_var($telephoneNo, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        
        $updateQuery = $dbcon->query("UPDATE refDetails SET gender = '$gender', grade = '$gradeClean', email = '$emailClean', telephoneNo = '$telephoneNoClean' WHERE id = '$reffId'");
        } 
        $currentDetails = $dbcon->query("SELECT * from refDetails where email = '".$_SESSION['email']."'");
        $reffResults = mysqli_fetch_assoc($currentDetails);
        $reffId = $reffResults["id"];{
          echo '
        <form action="profile.php" method="POST">
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
        <input class="btn btn-primary" type="submit" name="updateDetailsRef" value="Update Details">
        <a class="btn btn-primary" href="changePassword.php">Change Password</a>

        </form>
        </div>
        </div>
        </div>';

                } 

        ?>

</body>
</html>