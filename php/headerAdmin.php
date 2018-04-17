<?php
//Starts the Session
session_start();

?><!-- header -->
  <div class="container-fluid header">
    <div class="container-fluid headerInfo">
      <div class="row justify-content-sm-center">
        <div class="col-md-3"><!-- CWFA Logo -->
        <img alt="FAW_logo" class="img-fluid" src="images/rsz_faw_logosml.png">
      </div>
        <div class="col-md-6 text-center" id="pageTitle">
          <h1>CWFA Admin Home Page</h1>
        </div>
        <div class="col-md-3 headerRightText" id="headerRight">
          <table class="table-sm table-bordered" id="infoTable">
            <tbody>
              <tr class="table-success">
                <td><!-- Displays the Username of whomever is logged in -->
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
              <tr class="table-success">
                <!-- Displays the day of the week followed by the date -->
                <td>
                  <div id="date">
                    <?php echo date("l d/m/Y");?>
                  </div>
                </td>
              </tr>
              <tr class="table-success">
                <td>
                  <!-- Displays time -->
                  <div id="time">
                    <?php
                                      date_default_timezone_set('Europe/London');//sets the timezone to account for daylight savings, the site will only be used in the UK.
                                      echo "Time: ".date("G:i")." GMT"; ?><br>
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
