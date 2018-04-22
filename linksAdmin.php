<?php
//Starting Session
session_start();
//Checks that the user is logged in 
require "php/loginCheckAdmin.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"><!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="/MajorProject/Css/styles.css" rel="stylesheet">
  <title>Match Report</title>
</head>
<body>
  <!-- Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js">
  </script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
  </script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
  </script>
    <script src='js/timeOut.js'>
  </script>
  <!-- Header -->
   <?php include 'php/headerAdmin.php'; ?> <!-- Navbar -->
   <?php include 'php/navBarAdmin.php'; ?> <!-- Title -->
<div class="container-fluid">
	<div class="row justify-content-center">
	<div class="col-md-6 col-md-offset-3">
	<div class="container-fluid regContainer">
	<div class="text-center">
	    

	<p>External Links</p>
	<a href="http://www.faw.cymru/en/"  target="_blank">Click here to visit the FAW website</a><br>
  <a href="http://www.aberystwythleague.co.uk/"  target="_blank">Click here to visit the Cambrian Tyres League website</a><br>
  <a href="http://www.ceredigionleague.co.uk/"  target="_blank">Click here to visit the Costcutter League website</a><br>
  <a href="http://www.cwfa.co.uk/"  target="_blank">Click here to visit the CWFA website</a><br>
  </div>
	</div>
	</div>
	</div>
	</div>
</body>
</html>