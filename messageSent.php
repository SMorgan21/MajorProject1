<?php 

//Starting Session
session_start();

require "php/loginCheck.php";

//Connects to database
include 'php/connect.php';

?>

<?php 

if (isset($_POST['submitMessage'])){
	

//Prepare the variables
$recipient = mysqli_real_escape_string($dbcon, $_POST['recipient']);
$subject = mysqli_real_escape_string($dbcon, $_POST['subject']);
$subjectClean = filter_var($subject, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$message = mysqli_real_escape_string($dbcon, $_POST['message']);
$messageClean = filter_var($message, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

//Query to retrive refferee data
$sql = $dbcon->query("SELECT * from refDetails where email = '".$_SESSION['email']."'");
$reffResults = mysqli_fetch_assoc($sql);
$reffId = $reffResults["id"];
$reffFirstName = $reffResults["firstName"];
$reffSecondName = $reffResults["secondName"];
$reffFullName = $reffFirstName.' '.$reffSecondName; 

//Insert data into table
$messageData = $dbcon->query("INSERT INTO messages (reffFK, recievedFrom, recipient, subject, message) VALUES ('$reffId', '$reffFullName', '$recipient', '$subjectClean', '$messageClean')");

}
	
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/MajorProject/Css/styles.css">
  <title>New Message</title>
</head>
<body>
  <!-- Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Header -->
  <?php include 'php/headerAdmin.php'; ?>

  <!-- Navbar -->
  <?php include 'php/navBarAdmin.php'; ?>
  <div class="container-fluid">
  <div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
  <div class="container-fluid regContainer">
  <div class="text-center">
    <p>Message Sent Succesfully</p>
      <a href="profile.php" class="btn btn-primary" title="Click here to return to your hompage">Return to homepage</a>
     <a href="messages.php" class="btn btn-primary" title="Click here to return to your inbox">Return to inbox</a>
  </div>
  </div>
  </div>
  </div>
  </div>

</body>
</html>