<?php
if (isset($_POST['registration'])) {
  include 'php/connectRef.php';
  $firstName = mysqli_real_escape_string($dbcon, $_POST['firstName']);
  $secondName = mysqli_real_escape_string($dbcon,$_POST['secondName']);
  $userName = mysqli_real_escape_string($dbcon,$_POST['userName']);
  $password = mysqli_real_escape_string($dbcon,$_POST['password']);
  $gender = mysqli_real_escape_string($dbcon,$_POST['gender']);
  $grade = mysqli_real_escape_string($dbcon,$_POST['grade']);
  $email = mysqli_real_escape_string($dbcon,$_POST['email']);
  $telephoneNo = mysqli_real_escape_string($dbcon,$_POST['telephoneNo']);

  $data = $dbcon->query("INSERT INTO refDetails (firstName, secondName, userName, password, gender, grade, email) VALUES('$firstName','$secondName','$userName','$password','$gender','$grade','$email')");

}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>testNameCheck</title>
  <meta charset="utf-8">
</head>
<body>
  <form name="form"  method="post" action="testReg.php">
    <input type="text" name="userName" placeholder="userName" id="userNameInput"><br><br>
    <input type="text" name="firstName" placeholder="firstName" id="first Name"><br><br>
    <input type="text" name="second Name" placeholder="second" id="second Name"><br><br>
    <input type="password" name="password" placeholder="password" id="password"><br><br>
    <input type="text" name="gender" placeholder="Gender" id="gender"><br><br>
    <input type="number" name="telephoneNo" placeholder="telephone" id="telephone no"><br><br>
    <input type="email" name="email" placeholder="Email" id="email"><br><br>
    <input type="grade" name="grade" placeholder="grade" id="grade"><br><br>
    <input type="submit" name="registration" value="register" id="registration">
  </form>
</body>
</html>
