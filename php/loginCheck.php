<?php

session_start();

if(!isset($_SESSION["email"]) || !isset($_SESSION["loggedIn"])|| $_SESSION['userLevel'] == "admin"){
  header("location: profileAdmin.php");
  die();
}

?>
