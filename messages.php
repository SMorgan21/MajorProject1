<?php 
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
  <title>Inbox</title>
</head>
<body>
  <!-- Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Header -->
  <?php include 'php/header.php'; ?>

  <!-- Navbar -->
  <?php include 'php/navBar.php'; ?>

  <!-- Start of email section -->

  <!-- Messages -->

  <?php 

  if (isset($_GET['msg'])){

  	$id = $_GET['msg'];
  	//Searches the database for all messages that match the message Id
  	$msg = $dbcon->query("SELECT * FROM messages WHERE messageId = '$id'");
  	//Sets the message to read status
  	$read = $dbcon->query("UPDATE messages SET opened = '1'");

  	$row = mysqli_fetch_assoc($msg);
  	$from = $row['from'];
    $subject = $row['subject'];
    $message = $row['message'];
    $date = $row['date'];

?>

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <table class="table">
        	<thead class="thead-dark">
        		<tr>
        			<th scope="col">From</th>
        			<th scope="col">Subject</th>
        			<th scope="col">Message</th>
        			<th scope="col">Date</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php 
        		echo '<td>'.$from.'</td>';
        		echo '<td>'.$subject.'</td>';
        		echo '<td>'.$message.'</td>';
        		echo '<td>'.$date.'</td>';
        		?>        		
        	</tbody>
        </table>
        <a href="?remove=<?php echo $id; ?>" class="btn btn-danger btn-lg" role="button">Delete this message</a>
        <a href="messages.php" class="btn btn-primary" role="button">Back to Inbox</a>
    </div>
</div>
</div>
<?php exit(); } ?>

<?php 

if (isset($_GET['remove'])) {
	$id = $_GET['remove'];

	//Removes all messages with the message Id set above
	$remove = $dbcon->query("DELETE FROM messages WHERE messageId = '$id'");
	if ($remove) {
		header("location:messages.php"); //Redirects to the inbox page
	}else {
		die("Please Refresh Your Browser"); // If the remove request does not work this message will apear 
	}
	exit();
}

 ?>
<!-- End of Messages-->
  <!-- Start of Inbox  -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <table class="table">
        	<thead class="thead-dark">
        		<tr>
        			<th scope="col">From</th>
        			<th scope="col">Subject</th>
        			<th scope="col">Sent</th>
        			<th scope="col">Read</th>
        		</tr>
        	</thead>
        	<tbody>
             	<?php
             	//limits the amount of messages per page
             	$limit = 5;
             	//sets $p as a variable that contains an aray
             	$p = $_GET['p'];
             	//queries the database for all the information stored in the messages table
             	$get_total = mysqli_num_rows($dbcon->query("SELECT * FROM messages"));
             	//Used to get the ammount of pages, I take the ammount of pages and then divide them by the limit(5) and then round the answer up to an int
             	$total = ceil($get_total/$limit);

             	if (!isset($p) || $p <= 0) {
             		$offset = 0;
             	}else {
             		$offset = ceil($p - 1) * $limit;
             	}


        	$data = $dbcon->query("SELECT * FROM messages Limit $offset,$limit");
        	
        	while ($row = mysqli_fetch_assoc($data)){
        		
        		$id = $row['messageId'];
        		$from = $row['from'];
        		$subject = $row['subject'];
        		$message = $row['message'];
        		$date = $row['date'];
        		


        		if($row['opened'] == 1){
        			$opened = "Read";
        		}else {
        			$opened = "Unread";
        		}

        		echo '<tr>';
        		echo '<td><a href="?msg='.$id.'"> '.$from.' </a></td>';
        		echo '<td><a href="?msg='.$id.'"> '.$subject.' </a></td>';
        		echo '<td><a href="?msg='.$id.'"> '.$date.' </a></td>';
        		echo '<td><a href="?msg='.$id.'"> '.$opened.' </a></td>';
        		echo '</tr>';

        	}    	
		?>
        	</tbody>
        </table>
        <!-- Page number logic -->
        <?php
        if($get_total > $limit){
        	for($i = 1; $i <= $total; $i++){

        		echo '<div id="pages">';
				echo($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="?p='.$i.'">'.$i.'</a>'; 
				echo '</div>';
			}
			} 
		?>
		<!-- End of page number logic -->
		<!-- End of Inbox  -->

      </div>
    </div>
    <div>  
    </div>
  </div>
	
</body>
</html>