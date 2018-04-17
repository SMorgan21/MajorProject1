<?php
//to start a php session
session_start();

//unsets the session data attached to the user
unset($_SESSION['loggedIn']);
unset($_SESSION['email']);

header( "refresh:2; url=login.php" );
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"><!-- Bootstrap CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="/MajorProject/Css/styles.css" rel="stylesheet">
	<title>Change Password</title>
</head>
<body>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="http://code.jquery.com/jquery-3.3.1.js">
	</script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
	</script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
	</script>

	<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-3">
        <div class="text-center">
	<div class="container-fluid regContainer">
	<div class="text-center">
	    
	<p>You have been logged out successfully, your are being redirected to the login page</p>
	
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
</body>
</html>