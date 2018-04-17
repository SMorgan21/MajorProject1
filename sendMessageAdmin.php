<?php 

//Starting Session
session_start();

require "php/loginCheckAdmin.php";

//Connects to database
include 'php/connect.php';

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
	    <form name="sendMessage" method="post" action="messageSentAdmin.php">
	      <div class="container-fluid regContainer">
	         <div class="form-row">
                <div class="input-group-preprend">
                  <label class="input-group-text" for="recipient">Recipient</label>
                </div>
                <select class="form-control" name="recipient" id="recipientAdmin" required>
                  <option value="">Please Select a Recipient</option>
                  <?php
                  include 'php/connect.php';
                  $refNames = mysqli_query($dbcon, "SELECT CONCAT_WS( ' ', firstName, secondName) AS names FROM refDetails");
                  while ($row = mysqli_fetch_assoc($refNames)){
                    echo "<option value=\"{$row['names']}\">{$row['names']}</option>";
                  }
                  ?>
                </select>
              </div>
              <br>
              <div class="form-row">
              	<div class="input-group-preprend">
                <label class="input-group-text" for="subject">Subject</label>
            </div>
                <input class="form-control" type="text" name="subject" id="subjectAdmin" placeholder="Subject" maxlength="150" required>
              </div>
              <br>
              <div class="form-row">
              	<div class="input-group-preprend">
                <label class="input-group-text" for="message">Message</label>
            	</div>
                <textarea class="form-control" name="message" id="messageAdmin" rows="5" placeholder="Please Enter Your Message Here..." maxlength="5000" required></textarea> 
              </div>
              <br>
              <div class = "text-center">
              	<input type="submit" class="btn btn-primary" name="submitMessage" title="Clcik here to send your message" value="Send Message" id="submitMessageAdmin">
              	<a href="messagesAdmin.php" class="btn btn-primary" title="Click here to return to your inbox" role="button">Back to Inbox</a>
              </div>
	  </div>
	</form>
	</div>
	</div>
	</div>
</body>
</html>