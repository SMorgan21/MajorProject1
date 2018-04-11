<?php
//Starts the Session
session_start();

?><!-- header -->
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="container-fluid header">
    <div class="container-fluid headerInfo">
      <div class="row justify-content-md-center">
        <div class="col-md-3"><!-- CWFA Logo -->
        <img alt="FAW_logoSml" class="img-fluid headerLogo" src="images/FAW_logoSml.png"></div>
        <div class="col-md-6 text-center" id="pageTitle">
          <h1>CWFA Referee Home Page</h1>
        </div>
        <div class="col-md-3 headerRightText" id="headerRight">
          <table class="table table-responsive" id="infoTable">
            <tbody>
              <tr>
                <td class="align-middle"><!-- Displays the Username of whomever is logged in -->
                <span id="headerUsername">Username: <?php
                                // //Includes the connection details
                                include 'php/connect.php';
                                // //connects to the data base and requests the username of the user who has logged in
                                $sql = $dbcon->query("SELECT userName from refDetails where email = '".$_SESSION['email']."'");
                                // //while the name in the session variable matches the result from the query
                                  while( $name = mysqli_fetch_assoc($sql))
                                {
                                  echo "$name[userName]"; //display the username
                                }
                                ?></span></td>
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
                    <?php
                                      date_default_timezone_set('Europe/London');//sets the timezone to account for daylight savings, the site will only be used in the UK.
                                      echo "Time: ".date("G:i")." GMT"; ?><br>
                    <br>
                    <a class="logOut" href="logout.php">Log Out</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div><!-- End of header -->
</body>
</html>