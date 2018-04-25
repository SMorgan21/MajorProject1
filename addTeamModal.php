<?php 

session_start();//Starting Session
require "php/loginCheckAdmin.php";


if (isset($_POST['saveTeam'])) {//listening for the login button
  require 'php/connect.php';//includes the database connection information

$addTeamName = mysqli_real_escape_string($dbcon, $_POST['addTeamName']);
$addTeamNameClean = filter_var($addTeamName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$addTeamId = mysqli_real_escape_string($dbcon,$_POST['addTeamId']);
$addTeamIdClean = filter_var($addTeamId, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
  

$data = $dbcon->query("INSERT INTO teams (leagueFK, teamName) VALUES('$addTeamIdClean', '$addTeamNameClean')");

header('Location: ' . $_SERVER["HTTP_REFERER"] );
exit;

}

?>
