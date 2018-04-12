<?php
//Starting Session
session_start();
require "php/loginCheckAdmin.php";

if (isset($_POST['saveLeague'])) {

include 'php/connect.php';//connection details
$leagueName = mysqli_real_escape_string($dbcon,$_POST['leagueName']);
$newTeam1 = mysqli_real_escape_string($dbcon,$_POST['newTeam1']);
$newTeam2 = mysqli_real_escape_string($dbcon,$_POST['newTeam2']);



$data = $dbcon->query("INSERT INTO leagues (leagueName) VALUES ('$leagueName')");

$data1 = $dbcon->query("SELECT * FROM leagues ORDER BY id DESC LIMIT 1");

while ($row = mysqli_fetch_assoc($data1)){

  $leagueId = $row['id'];
}
$data2 = $dbcon->query("INSERT INTO teams (leagueFK, teamName) VALUES ('$leagueId','$newTeam1'),('$leagueId','$newTeam2')");

echo $leagueName ."<br>"; 
echo $newTeam1."<br>";
echo $newTeam2."<br>";
echo $leagueId;
// echo $datePlayed ."<br>";
// echo $location ."<br>";

}
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
  <form action="addNewLeague.php" method="POST">
  <input type="text" name="leagueName" value="" placeholder="league name">
  <input type="text" name="newTeam1" value="" placeholder="team 1">
  <input type="text" name="newTeam2" value="" placeholder="team 2">  
  <input class="btn btn-success" type="submit" name="saveLeague" value="Save New League/Competition">
  </form>
</body>
</html>