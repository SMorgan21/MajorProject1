<?php
DEFINE ('DB_USER', 'root'); // set userName
DEFINE ('DB_PSWD', 's6flh5zd'); //set Password
DEFINE ('DB_HOST', 'localhost'); //set Host
DEFINE ('DB_NAME', 'refInfo1'); // set database

$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME); // Connect to the database

if (!$dbcon) {
 die("Connection failed: " . mysqli_connect_error());
}
?>
