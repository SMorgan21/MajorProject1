<?php
//to start a php session
session_start();

//unsets the session data attached to the user
unset($_SESSION['loggedIn']);
unset($_SESSION['email']);

echo "You have been logged out successfully, your are being redirected to the login page";
header( "refresh:1; url=loginTest.php" );
 ?>
