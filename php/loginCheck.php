<?php

session_start();

if(!isset($_SESSION["email"]) || !isset($_SESSION["loggedIn"])){
  header("location: loginTest.php");
  exit();
}

?>
