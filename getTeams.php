<?php include("php/connect.php");

if(isset($_POST['leagueId'])) {
  $sql = "SELECT * FROM teams WHERE leagueFK =".mysqli_real_escape_string($dbcon, $_POST['leagueId']);
  $results = mysqli_query($dbcon, $sql);
  if(mysqli_num_rows($results) > 0) {
    echo "<option value=''> Please Select A Team </option>";
    while($row = mysqli_fetch_object($results)) {
      echo "<option value='".$row->teamName."'>".$row->teamName."</option>";
    }
  }
}
 else {
  header('location: ./');
}
?>
