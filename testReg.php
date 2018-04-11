<?php

session_start();//Starting Session
require "php/loginCheckAdmin.php";

include "php/connect.php";
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
  <!-- Header -->
    <?php include 'php/headerAdmin.php'; ?> <!-- Navbar -->
    <?php include 'php/navBarAdmin.php'; ?>
  
 <!-- Edit Leagues -->
  <?php 

  if (isset($_GET['editLeague'])){

  $Id = $_GET['editLeague'];

  $teams = $dbcon->query("SELECT * FROM teams WHERE leagueFK = '$Id' ORDER BY teamName");
  $league = $dbcon->query("SELECT * FROM leagues WHERE id = '$Id' ORDER BY leagueName");
  $rowLeague=mysqli_fetch_assoc($league);


  ?>

  <div class="container-fluid">
    <!-- add Team modal -->
    <div class="modal fade" id="addTeamModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
          <form name="addTeamForm" id="addTeamForm" action="php/addTeamModal.php" method="POST">
        <div class="modal-header modal-lg">
          <h2 class="modal-title modal-lg">Add a team</h2>
        </div>
        <div class="modal-body modal-lg">
          <input class="form-control" type="text" name="addTeamName" placeholder="Team Name"><br>
          <select class="form-control" id="addNewTeamLeague" name="addNewTeamLeague">
                  <option value="<?php  echo $rowLeague["leagueName"]; ?>">
                    <?php  echo $rowLeague["leagueName"]; ?>
                  </option>
                  <?php
                  include 'php/connect.php';
                  $data = mysqli_query($dbcon, "SELECT * FROM leagues");
                  while ($row = $data->fetch_assoc()){
                    echo "<option value=\"{$row['id']}\">{$row['leagueName']}</option>";
                  }
                  ?>
                </select>
                <small id="confirmLeagueHelp" class="form-text text-muted">
                  Check that the league is correct, If it is click save</small>
              </div>
              <input class="form-control" type="text" name="addTeamId" value="<?php echo "$Id"; ?>" hidden>
        <div class="modal-footer modal-lg">
               <input class="btn-success" type="submit" name="saveTeam" value="Save Team">      
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
          <div class="table-responsive">
            <table class="table table-dark table-bordered">
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
                <td> <a class="btn btn-danger" role="button" href="?deleteTeam='.$teamId.'">Delete this Team</a></td>
                </tr>';
                }
                ?>
              </tbody>
            </table>
            <div class="text-center"></div>
          </div>
          <div class="text-center">
            <input class="btn btn-success" type="button" value="Add A Team" role="button" id="addTeam">
            <a class="btn btn-primary" href="profileAdmin.php" role="button">Back Home Page</a>


          </div>
        </div>
      </div>
    </div>
  </div> <?php exit(); } ?>



  </body>
  </html>