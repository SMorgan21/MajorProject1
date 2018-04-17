<?php 

session_start();
require "php/loginCheckAdmin.php";
include 'php/connect.php';

   if (isset($_POST['updateDetailsRef'])) {
        $gender = mysqli_real_escape_string($dbcon,$_POST['gender']);
        $genderClean = filter_var($gender, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $grade = mysqli_real_escape_string($dbcon,$_POST['grade']);
        $gradeClean = filter_var($grade, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $email = mysqli_real_escape_string($dbcon,$_POST['email']);
        $emailClean = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
        $telephoneNo = mysqli_real_escape_string($dbcon,$_POST['telephoneNo']);
        $telephoneNoClean = filter_var($telephoneNo, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        
	    $currentDetails = $dbcon->query("SELECT * from refDetails where email = '".$_SESSION['email']."'");
        $reffResults = mysqli_fetch_assoc($currentDetails);
        $reffId = $reffResults["id"]; 

        $updateQuery = $dbcon->query("UPDATE refDetails SET gender = '$gender', grade = '$gradeClean', email = '$emailClean', telephoneNo = '$telephoneNoClean' WHERE id = '$reffId'");
        
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
        exit;

        } 

        
 ?>
