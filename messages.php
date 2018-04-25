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
  <title>Inbox</title>
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
  </script> <!-- Header -->
   <?php include 'php/header.php'; ?> <!-- Navbar -->
   <?php include 'php/navBar.php'; ?> <!-- Start of email section -->
   <!-- Messages -->
   <?php 

    if (isset($_GET['msg'])){

      $id = $_GET['msg'];
      //Searches the database for all messages that match the message Id
      $msg = $dbcon->query("SELECT * FROM messages WHERE messageId = '$id'");
      //Sets the message to read status
      $read = $dbcon->query("UPDATE messages SET opened = '1' WHERE messageId = '$id'");

      $row = mysqli_fetch_assoc($msg);
      $from = $row['recievedFrom'];
      $subject = $row['subject'];
      $message = $row['message'];
      $dateRecieved = $row['dateRecieved'];

      //Query to retrive refferee data
      $sql = $dbcon->query("SELECT * from refDetails where email = '".$_SESSION['email']."'");
      $reffResults = mysqli_fetch_assoc($sql);
      $reffFirstName = $reffResults["firstName"];
      $reffSecondName = $reffResults["secondName"];
      $reffFullName = $reffFirstName.' '.$reffSecondName;     
      
      
  ?>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="regContainer">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">From</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Message</th>
                  <th scope="col">Recieved</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                                echo '<td>'.$from.'</td>';
                                echo '<td>'.$subject.'</td>';
                                echo '<td>'.$message.'</td>';
                                echo '<td>'.$dateRecieved.'</td>';
                                ?>
              </tbody>
            </table>
          </div>
          <div class="text-center">
            <a class="btn btn-primary" href="messages.php" title="Click here to return to your home page" role="button">Back to Inbox</a> 
            <a class="btn btn-primary" href="sendMessage.php" id="composeMessage" name="composeMessage" title="Click here to compose a new message" role="button">Compose New Message</a> 
            <a class="btn btn-danger" role="button" onclick="return deleteMessageConfirmAlert();" title="Click here to delete this message" href="?delete=<?php echo $id; ?>;">Delete this message</a>
          </div>
          <script type="text/javascript">
                function deleteMessageConfirmAlert()
                {
                  var conf = confirm("Are you sure you want to delete this message?");
                  if (conf)
                    return true;
                  else
                    return false;
                }
              </script>
        </div>
      </div>
    </div>
  </div><?php exit(); } ?><?php 

  if (isset($_GET['delete'])) {
      $id = $_GET['delete'];

      //Removes all messages with the message Id set above
      $delete = $dbcon->query("DELETE FROM messages WHERE messageId = '$id'");
      if ($delete) {
          header("location:messages.php"); //Redirects to the inbox page
      }else {
          die("Please Refresh Your Browser"); // If the delete request does not work this message will apear 
      }
      exit();
  }

   ?><!-- End of Messages-->
  <!-- Start of Inbox  -->
  <div class="container-fluid regContainer col-md-9">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="text-center">
          <h2>Inbox</h2>
          <p>To view a message click on any part of the message bellow</p>
        </div>        
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">From</th>
                <th scope="col">Subject</th>
                <th scope="col">Recieved</th>
                <th scope="col">Read</th>
              </tr>
            </thead>
            <tbody>
              <?php
                              //Query to retrive refferee data
                              $sql = $dbcon->query("SELECT * from refDetails where email = '".$_SESSION['email']."'");
                              $reffResults = mysqli_fetch_assoc($sql);
                              $reffFirstName = $reffResults["firstName"];
                              $reffSecondName = $reffResults["secondName"];
                              $reffFullName = $reffFirstName.' '.$reffSecondName;     
                              
                              //limits the amount of messages per page
                              $messageLimit = 5;
                              
                              //sets $page as a variable that contains an aray
                              $page = $_GET['page'];
                              
                              //queries the database for all the information stored in the messages table
                              $messageResults = mysqli_num_rows($dbcon->query("SELECT * FROM messages WHERE recipient = '$reffFullName'"));
                              
                              //Used to get the ammount of pages. I take the ammount of pages and then divide them by the messageLimit(5) and then round the answer up to an int
                              $totalMessages = ceil($messageResults/$messageLimit);

                              //Page Logic
                              if (!isset($page) || $page <= 0) {
                                  $pageOffSet = 0;
                              }else {
                                  $pageOffSet = ceil($page - 1) * $messageLimit;
                              }


                              $data = $dbcon->query("SELECT * FROM messages WHERE recipient = '$reffFullName' ORDER BY dateRecieved DESC LIMIT $pageOffSet,$messageLimit");
                          
                              while ($row = mysqli_fetch_assoc($data)){
                              $id = $row['messageId'];
                              $from = $row['recievedFrom'];
                              $subject = $row['subject'];
                              $message = $row['message'];
                              $dateRecieved = $row['dateRecieved'];
                              

                          //changes the value of opened to view read if the message is viewed
                              if($row['opened'] == 1){
                                  $opened = "Read";
                              }else {
                                  $opened = "Unread";
                              }

                              echo '<tr>';
                              echo '<td><a href="?msg='.$id.'"> '.$from.' </a></td>';
                              echo '<td><a href="?msg='.$id.'"> '.$subject.' </a></td>';
                              echo '<td><a href="?msg='.$id.'"> '.$dateRecieved.' </a></td>';
                              echo '<td><a href="?msg='.$id.'"> '.$opened.' </a></td>';
                              echo '</tr>';

                          }       
                      ?>
            </tbody>
          </table>
        </div><!-- End of Inbox  -->
        <!-- Compose Button -->
        <div class="text-center">
          <a class="btn btn-primary btn" href="sendMessage.php" id="composeMessage" title="Click here to compose a new message" role="button">Compose New Message</a><br><br>
        </div>
       
        <!-- End Of Compose Button -->
         <!-- Page number logic -->
         <?php
                if($messageResults > $messageLimit){
                    

                        echo '<div class="row">';
                        echo '<div class="col-md-12">';
                        echo '<div class="text-center pages">';
                        for($i = 1; $i <= $totalMessages; $i++){
                        echo($i == $page) ? '<a class="active">'.$i.'</a>' : '<a href="?page='.$i.'">'.$i.'</a>'; 
                        }
                        echo'</div>';

                        echo'</div>';
                        echo'</div>';
                    
                    } 
                ?> <!-- End of page number logic -->
      </div>
    </div>
  </div>
</body>
</html>