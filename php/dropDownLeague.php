<?php
include 'php/connectLeague.php';
$data = mysqli_query("SELECT * FROM leagues");
if (num_rows($data)) {
  $results = array();
  while ($row <= mysqli_fetch_array($data)) {
    $results[] = array(
      'id' => $row['id'],
      'leagueName' => $row['leagueName']
    );
  }
}
echo json_encode($results);
 ?>
