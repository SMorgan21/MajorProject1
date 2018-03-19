<?php
//Starts the Session
session_start();
//Includes the connection details
include 'php/connectRef.php';
//connects to the data base and requests the username of the user who has logged in
$data = $dbcon->query("SELECT userName from refDetails where email = '".$_SESSION['email']."'");
 ?>
<!-- header -->
<div class="container-fluid header">
  <div class="container-fluid headerInfo">
    <div class="row justify-content-md-center">
      <div class="col-md-3">
        <!-- CWFA Logo -->
        <img src="images/FAW_logoSml.png" class="img-fluid headerLogo" alt="FAW_logoSml">
      </div>
      <div class="col-md-6 text-center" id="pageTitle">
        <h1>CWFA Admin Home Page</h1>
      </div>
      <div class="col-md-3 headerRightText" id="headerRight">
        <table class="table table-responsive" id="infoTable">
          <tbody>
            <tr>
              <td class="align-middle">
                <!-- Displays the Username of whomever is logged in -->
                <span id="headerUsername">Username: <?php while( $name = mysqli_fetch_assoc($data) )
                {
                  echo "$name[userName]";
                } ?> </span>
              </td>
            </tr>
            <tr>
              <!-- Displays the day of the week followed by the date -->
              <td class="align-middle">
                <div id="date">
                  <?php echo date("l d/m/Y");?>
                </div>
              </td>
            </tr>
            <tr>
              <td class="align-middle">
                <!-- Displays time -->
                <div id="time">
                  <?php echo date("h:i:sa"); ?>
                  <br>
                  <a href="logoutTest.php">Log Out</a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  <!-- End of header -->
