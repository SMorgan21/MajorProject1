<?php
//Starting Session
session_start();
require "php/loginCheckAdmin.php";

if (isset($_POST['saveLeague'])) {

include 'php/connect.php';//connection details
$leagueName = mysqli_real_escape_string($dbcon,$_POST['leagueName']);
$leagueNameClean = filter_var($leagueName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$newTeam1 = mysqli_real_escape_string($dbcon,$_POST['newTeam1']);
$newTeam1Clean = filter_var($newTeam1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$newTeam2 = mysqli_real_escape_string($dbcon,$_POST['newTeam2']);
$newTeam2Clean = filter_var($newTeam2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


$data = $dbcon->query("INSERT INTO leagues (leagueName) VALUES ('$leagueNameClean')");

$data1 = $dbcon->query("SELECT * FROM leagues ORDER BY id DESC LIMIT 1");

while ($row = mysqli_fetch_assoc($data1)){

  $leagueId = $row['id'];
}
$data2 = $dbcon->query("INSERT INTO teams (leagueFK, teamName) VALUES ('$leagueId','$newTeam1Clean'),('$leagueId','$newTeam2Clean')");
header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;
}
?>