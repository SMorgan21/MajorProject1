<?php
//Starting Session
session_start();
//connection details
include 'php/connect.php';

  $addTeamName = $_POST['addTeamName'];
  
  $addTeamId = $_POST['addTeamId'];

//Query
  

echo $addTeamName;
echo $addTeamId;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>test</title>
  <link rel="stylesheet" href="">
</head>
<body>
  <div class="container-fluid">
    <!-- add Team modal -->
    <div class="modal fade" id="addTeamModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
          <form name="addTeamForm" id="addTeamForm" action="addTeamModal.php" method="POST">
        <div class="modal-header modal-lg">
          <h2 class="modal-title modal-lg">Add a team</h2>
        </div>
        <div class="modal-body modal-lg">
          <input class="form-control" type="text" name="addTeamName" placeholder="Team Name" id="addTeamName"><br>
          <input class="form-control" type="text" name="addNewTeamLeague" value="<?php  echo $rowLeague["leagueName"]; ?>" id="addNewTeamLeague" hidden><br>
          <input class="form-control" type="text" name="addTeamId" value="2" >
        <div class="modal-footer modal-lg">
          <input class="btn-success" type="submit" name="saveTeam" id="saveTeam" value="Save Team">      
        </div>
        </form>
           </div>
        </div>
      </div>      
    </div>
</body>
</html>
