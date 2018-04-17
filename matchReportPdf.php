<?php 
//Session Data
session_start();
//Connects to the data base
include 'php/connect.php';
//Includes the FDPF library
include 'fpdf.php';
//Matchreport PDF
class PDF extends FPDF{
    
    function Header(){
    // Logo
    $this->Image('images/FAW_logoSml.png',10,6,30);
    // Arial bold 14
    $this->SetFont('Arial','B',16);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,15,'Central Wales Football Association',0,0,'C');
    // Line break
    $this->Ln(10);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,15,'Official Report For Referees',0,1,'C');
    }
    function Footer(){
        //Positions Footer at 1.5cm from the bottom of the page
        $this->SetY(-15);
        //Setting font and text size
        $this->SetFont('Arial','',8);
        //Page Numbers
        $this->Cell(0,10,'Page '.$this->PageNo().' of {nb}',0,0,'C');
    }
}
//Setting the page layout
$pdf = new PDF('p', 'mm', 'A4');
// Defines an alias for the total page number
$pdf->AliasNbPages();
//Creates a new page
$pdf->AddPage();
//Sets the Font family, style and size
$pdf->SetFont('Arial','',10);
//Table query for results
//$reportData = $dbcon->query("SELECT * FROM reports1");
//while ($reportResults = mysqli_fetch_assoc($reportData)){
//Setting the page layout
if (!empty($_POST['submitMatchReport'])) {
     //Reports Table
  $league = mysqli_real_escape_string($dbcon, $_POST['league']);
  $homeTeam = mysqli_real_escape_string($dbcon, $_POST['homeTeam']);
  $awayTeam = mysqli_real_escape_string($dbcon, $_POST['awayTeam']);
  $datePlayed = mysqli_real_escape_string($dbcon, $_POST['datePlayed']);
  $location = mysqli_real_escape_string($dbcon, $_POST['location']);
  $league = mysqli_real_escape_string($dbcon, $_POST['league']);
  $surname1 = mysqli_real_escape_string($dbcon,$_POST['surname1']);
  $surname1Clean = filter_var($surname1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $firstName1 = mysqli_real_escape_string($dbcon,$_POST['firstName1']);
  $firstName1Clean = filter_var($firstName1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $caution1 = mysqli_real_escape_string($dbcon,$_POST['caution1']);
  $team1 = mysqli_real_escape_string($dbcon,$_POST['team1']);
  $sendOff1 = mysqli_real_escape_string($dbcon,$_POST['sendOff1']);
  $surname2 = mysqli_real_escape_string($dbcon,$_POST['surname2']);
  $surname2Clean = filter_var($surname2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $firstName2 = mysqli_real_escape_string($dbcon,$_POST['firstName2']);
  $firstName2Clean = filter_var($firstName2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $caution2 = mysqli_real_escape_string($dbcon,$_POST['caution2']);
  $team2 = mysqli_real_escape_string($dbcon,$_POST['team2']);
  $sendOff2 = mysqli_real_escape_string($dbcon,$_POST['sendOff2']);
  $surname3 = mysqli_real_escape_string($dbcon,$_POST['surname3']);
  $surname3Clean = filter_var($surname3, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $firstName3 = mysqli_real_escape_string($dbcon,$_POST['firstName3']);
  $firstName3Clean = filter_var($firstName3, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $caution3 = mysqli_real_escape_string($dbcon,$_POST['caution3']);
  $team3 = mysqli_real_escape_string($dbcon,$_POST['team3']);
  $sendOff3 = mysqli_real_escape_string($dbcon,$_POST['sendOff3']);
  $surname4 = mysqli_real_escape_string($dbcon,$_POST['surname4']);
  $surname4Clean = filter_var($surname4, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $firstName4 = mysqli_real_escape_string($dbcon,$_POST['firstName4']);
  $firstName4Clean = filter_var($firstName4, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $caution4 = mysqli_real_escape_string($dbcon,$_POST['caution4']);
  $team4 = mysqli_real_escape_string($dbcon,$_POST['team4']);
  $sendOff4 = mysqli_real_escape_string($dbcon,$_POST['sendOff4']);
  $surname5 = mysqli_real_escape_string($dbcon,$_POST['surname5']);
  $surname5Clean = filter_var($surname5, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $firstName5 = mysqli_real_escape_string($dbcon,$_POST['firstName5']);
  $firstName5Clean = filter_var($firstName5, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $caution5 = mysqli_real_escape_string($dbcon,$_POST['caution5']);
  $team5 = mysqli_real_escape_string($dbcon,$_POST['team5']);
  $sendOff5 = mysqli_real_escape_string($dbcon,$_POST['sendOff5']);
  $surname6 = mysqli_real_escape_string($dbcon,$_POST['surname6']);
  $surname6Clean = filter_var($surname6, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $firstName6 = mysqli_real_escape_string($dbcon,$_POST['firstName6']);
  $firstName6Clean = filter_var($firstName6, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $caution6 = mysqli_real_escape_string($dbcon,$_POST['caution6']);
  $team6 = mysqli_real_escape_string($dbcon,$_POST['team6']);
  $sendOff6 = mysqli_real_escape_string($dbcon,$_POST['sendOff6']);
  $surname7 = mysqli_real_escape_string($dbcon,$_POST['surname7']);
  $surname7Clean = filter_var($surname7, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $firstName7 = mysqli_real_escape_string($dbcon,$_POST['firstName7']);
  $firstName7Clean = filter_var($firstName7, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $caution7 = mysqli_real_escape_string($dbcon,$_POST['caution7']);
  $team7 = mysqli_real_escape_string($dbcon,$_POST['team7']);
  $sendOff7 = mysqli_real_escape_string($dbcon,$_POST['sendOff7']);
  //Query to retrive refferee data
  $sql = $dbcon->query("SELECT id, userName from refDetails where email = '".$_SESSION['email']."'");
  $reffResults = mysqli_fetch_assoc($sql);
  $reffId = $reffResults["id"];
  $reffUserName = $reffResults["userName"];
  //Query to insert data into the report table
  $reportData = $dbcon->query("INSERT INTO reports1 (reffFK, reffUserName, league, homeTeam, awayTeam, location, datePlayed, surname1, firstName1, caution1, team1, surname2, firstName2, caution2, team2, surname3, firstName3, caution3, team3,  surname4, firstName4, caution4, team4, surname5, firstName5, caution5, team5, surname6, firstName6, caution6, team6, surname7, firstName7, caution7, team7) Values ('$reffId', '$reffUserName', '$league', '$homeTeam', '$awayTeam', '$location', '$datePlayed', '$surname1Clean', '$firstName1Clean', '$caution1', '$team1', '$surname2Clean', '$firstName2Clean', '$caution2', '$team2', '$surname3Clean', '$firstName3Clean', '$caution3', '$team3', '$surname4Clean', '$firstName4Clean', '$caution4', '$team4', '$surname5Clean', '$firstName5Clean', '$caution5', '$team5', '$surname6Clean', '$firstName6Clean', '$caution6', '$team6', '$surname7Clean', '$firstName7Clean', '$caution7', '$team7')");
    
//Dummy Cell for formatting
$pdf->Cell(10,20,'',0,1);
//Dummy Cell for formatting
$pdf->Cell(28,0,'',0,0);
//League
$pdf->Cell(25,5,'League: ',0,0,'L');
$pdf->Cell(5,5,$league,0,1,'L');
//Dummy Cell for formatting
$pdf->Cell(10,5,'',0,1);
//Dummy Cell for formatting
$pdf->Cell(28,0,'',0,0);
//Teams
$pdf->Cell(25,5,'Home Team: ',0,0,'L');
$pdf->Cell(30,5,$homeTeam,0,0,'L');
$pdf->Cell(10,0,'',0,0);
$pdf->Cell(10,5,' VS ',0,0,'L');
$pdf->Cell(25,5,'Away Team: ',0,0,'L');
$pdf->Cell(30,5,$awayTeam,0,1,'L');
//Dummy Cell for formatting
$pdf->Cell(10,5,'',0,1);
//Dummy Cell for formatting
$pdf->Cell(28,0,'',0,0);
//Date
$pdf->Cell(25,5,'Date Played: ',0,0,'L');
$pdf->Cell(25,5,$datePlayed,0,0,'L');
$pdf->Cell(25,5,'Location: ',0,0,'C');
$pdf->Cell(20,5,$location,0,1,'L');
//Draws a rectangle (left,down,width,hight,'drawline')
//$pdf->Rect(30, 55, 150, 40, 'D');
//Dummy Cell for formatting
$pdf->Cell(5,15,'',0,1);
//Set Font
$pdf->SetFont('Arial','B',12);
//Mid Title
$pdf->Cell(0,10,'Name Of Offenders - Important: use same form for both clubs for cautions',0,1,'C');
$pdf->Cell(0,10,'For send offs use only one name per form',0,1,'C');
//Dummy Cell for formatting
$pdf->Cell(5,7,'',0,1);
//Set Font
$pdf->SetFont('Arial','B',10);
//Dummy Cell for formatting
$pdf->Cell(5,0,'',0,0);
//Surname
$pdf->Cell(35,5,'Surname ',0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,0,'',0,0);
//First Nam5
$pdf->Cell(35,5,'First Name ',0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,0,'',0,0);
//Team
$pdf->Cell(35,5,'Team ',0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,0,'',0,0);
//Caution
$pdf->Cell(35,5,'Caution Code ',0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,0,'',0,0);
//Send Off
$pdf->Cell(35,5,'Send Off Code ',0,1,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,1);
// Group 1
//Set Font
$pdf->SetFont('Arial','',10);
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Surname
$pdf->Cell(35,5,$surname1Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//First Name
$pdf->Cell(35,5,$firstName1Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Team
$pdf->Cell(35,5,$team1,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Caution
$pdf->Cell(35,5,$caution1,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Send Off
$pdf->Cell(35,5,$sendOff1,0,1,'L');
//Group 2
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Surname
$pdf->Cell(35,5,$surname2Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//First Name
$pdf->Cell(35,5,$firstName2Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Team
$pdf->Cell(35,5,$team2,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Caution
$pdf->Cell(35,5,$caution2,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);

//Group 2
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Surname
$pdf->Cell(35,5,$surname3Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//First Name
$pdf->Cell(35,5,$firstName3Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Team
$pdf->Cell(35,5,$team3,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Caution
$pdf->Cell(35,5,$caution3,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);

//Group 4
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Surname
$pdf->Cell(35,5,$surname4Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//First Name
$pdf->Cell(35,5,$firstName4Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Team
$pdf->Cell(35,5,$team4,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Caution
$pdf->Cell(35,5,$caution4,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);

//Group 5
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Surname
$pdf->Cell(35,5,$surname5Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//First Name
$pdf->Cell(35,5,$firstName5Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Team
$pdf->Cell(35,5,$team5,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Caution
$pdf->Cell(35,5,$caution5,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);

//Group 6
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Surname
$pdf->Cell(35,5,$surname6Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//First Name
$pdf->Cell(35,5,$firstName6Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Team
$pdf->Cell(35,5,$team6,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Caution
$pdf->Cell(35,5,$caution6,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);

//Group 7
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Surname
$pdf->Cell(35,5,$surname7Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//First Name
$pdf->Cell(35,5,$firstName7Clean,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Team
$pdf->Cell(35,5,$team7,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);
//Caution
$pdf->Cell(35,5,$caution7,0,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,5,'',0,0);

}

//Outputs the data
 $pdf->Output('D','Match Report - '.$homeTeam.' vs '.$awayTeam.' '.$datePlayed.'.pdf');