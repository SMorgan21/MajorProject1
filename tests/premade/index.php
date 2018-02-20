<?php
session_start();
if (!isset($_SESSION[$userName])) {
  header(string: "Location: registration.php");
  exit();
}
$usrName = $_SESSION['userName'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home - Referees Area</title>
  </head>
  <body>
    <h1>Welcome <?php echo $userName; ?></h1>
  </body>
</html>
