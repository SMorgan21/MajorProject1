<?php
//Starting Session
session_start();
require "php/loginCheck.php";
//Connects to database
include 'php/connect.php';
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
	</script> <!-- checks for input in the email input and displays a message -->
	<script src="js/checkChangePassEmail.js">
	</script> <!-- checks for input in the refereeNumber input and displays a message -->

	
	<?php include 'php/header.php'; ?> <!-- Navbar -->
	
	<?php include 'php/navBar.php'; ?> 

	<?php
	if ($_POST['changePasswordDetails']) {

	//Check inputs
	$oldPassword = mysqli_real_escape_string($dbcon,$_POST['currentPassword']);
	$oldPasswordClean = filter_var($oldPassword, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


	$newPassword = mysqli_real_escape_string($dbcon,$_POST['newPassword']);
	$newPasswordClean = filter_var($newPassword, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$newHashed = password_hash($newPasswordClean, PASSWORD_BCRYPT);//encrypts the password using blowfish encryption



	$email = mysqli_real_escape_string($dbcon,$_POST['changeEmail']);
	$emailClean = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);

	$data = $dbcon->query("SELECT password, id FROM refDetails WHERE email='$emailClean'");//executes a query to the database which selects an id and password that matches the email entered                

	if (mysqli_num_rows($data) > 0) {//if a the number of matches are greater than 0
	$passData = mysqli_fetch_assoc($data);//puts the data from the databass into an array and then into a variable
	$oldPasswordResult = $passData["password"];
	$reffId = $passData["id"];

	if (password_verify($oldPasswordClean, $oldPasswordResult)) {//if the password in the database matches the one entered

	$updatePassword = $dbcon->query("UPDATE refDetails SET password = '$newHashed' WHERE id = '$reffId'");

	//unsets the session data attached to the user
	unset($_SESSION['loggedIn']);
	unset($_SESSION['email']);

	session_destroy();
	echo'
	<div class="container-fluid">
	<div class="row justify-content-center">
	<div class="col-md-6 col-md-offset-3">
	<div class="container-fluid regContainer">
	<div class="text-center">
	    

	<p>Your Details have been updated</p>
	<a class="btn btn-primary" href="login.php">Click here to log back in</a>
	</div>
	</div>
	</div>
	</div>
	</div>';

	}else{ echo'
	<div class="container-fluid">
	<div class="row justify-content-center">
	<div class="col-md-6 col-md-offset-3">
	<div class="container-fluid regContainer">
	<p>Your email or your current password was entered incorectly</p>
	<a href="changePassword.php" class="btn btn-primary">Click here to try again</a>
	</div>
	</div>
	</div>
	</div>';


	}
	exit();
	}
	}else{

	echo "
	<form name='changePassword' action='changePassword.php' method='POST' accept-charset='utf-8'>
	<div class='container-fluid regContainer col-md-4'>
	<div class='form-group'>
	<div class='input-group-preprend'>
	<label class='input-group-text' for='changeEmail'>Email</label>
	</div>
	<input class='form-control' type='email' name='changeEmail' id='changeEmail' placeholder='Email' autocomplete='email' required>
	</div>
	<div class='form-group' id='changeEmailFeedBack'>
    </div>
	<div class='form-group'>
	<div class='input-group-preprend'>
	<label class='input-group-text' for='currentPassword'>Current Password</label>
	</div>
	<input class='form-control' type='password' name='currentPassword' id='currentPassword' placeholder='Current Password' required>
	</div>
	<div class='form-group'>
	<div class='input-group-preprend'>
	<label class='input-group-text' for='newPassword'>New Password</label>
	</div>
	<input class='form-control' type='password' name='newPassword' placeholder='************' id='newPassword' minlength='8' maxlength='20' autocomplete='new-password'>
	<small id='passwordHelpBlock' class='form-text text-muted'>
	Your password must be 8-20 characters long</small>
	</div>
	<script src='js/changePasswordCheck.js'></script>
	<div class='form-group'>
	<div class='input-group-preprend'>
	<label class='input-group-text' for='conPassword'>Confirm Password</label>
	</div>
	<input class='form-control' type='password' name='conPassword' placeholder='************'id='changeConPassword'>
	<div class='alert alert-danger hidden' id='changeNoMatch' role='alert'><strong>Your Passwords don't match,</strong> try again</div>
	<div class='alert alert-success hidden' id='changeMatch' role='alert'><strong>Well done!</strong> You passwords match</div>
	</div>
	<div class='form-group'>
	<?php echo $message; ?>
	<form>
		<input class='btn btn-primary btn-block' id='changePassword' name='changePasswordDetails' type='submit' value='Change Password'>
	</form>"; } 
	?>
</body>
</html>