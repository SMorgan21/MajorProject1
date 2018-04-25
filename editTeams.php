<?php include("php/connect.php");

if(isset($_POST['leagueId'])) {
  $sql = "SELECT * FROM teams WHERE leagueFK =".mysqli_real_escape_string($dbcon, $_POST['leagueId']);
  $results = mysqli_query($dbcon, $sql);
    while($row = mysqli_fetch_object($results)) {
    	$id = $row->leagueFK;
      echo "<tr>";
      echo '<td><a href="?editLeague='.$id.'">'.$row->teamName.'</td>';
      echo "</tr>";
    }
}
 else {
  header('location: ./');
}
?>
