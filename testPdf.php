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
$reportData = $dbcon->query("SELECT * FROM reports1");
while ($reportResults = mysqli_fetch_assoc($reportData)){

//Setting the page layout

//Dummy Cell for formatting
$pdf->Cell(10,20,'',0,1);
//Dummy Cell for formatting
$pdf->Cell(28,0,'',0,0);
//League
$pdf->Cell(25,5,'League: ',0,0,'L');
$pdf->Cell(5,5,$reportResults['league'],0,1,'L');
//Dummy Cell for formatting
$pdf->Cell(10,5,'',0,1);
//Dummy Cell for formatting
$pdf->Cell(28,0,'',0,0);
//Teams
$pdf->Cell(25,5,'Home Team: ',0,0,'L');
$pdf->Cell(30,5,$reportResults['homeTeam'],0,0,'L');
$pdf->Cell(20,5,' VS ',0,0,'L');
$pdf->Cell(25,5,'Away Team: ',0,0,'L');
$pdf->Cell(30,5,$reportResults['awayTeam'],0,1,'L');
//Dummy Cell for formatting
$pdf->Cell(10,5,'',0,1);
//Dummy Cell for formatting
$pdf->Cell(28,0,'',0,0);
//Date
$pdf->Cell(25,5,'Date Played: ',0,0,'L');
$pdf->Cell(25,5,$reportResults['datePlayed'],0,0,'L');
$pdf->Cell(25,5,'Location: ',0,0,'C');
$pdf->Cell(20,5,$reportResults['location'],0,1,'L');

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
$pdf->Cell(5,5,'',1,1);
//Set Font
$pdf->SetFont('Arial','',10);
//Dummy Cell for formatting
$pdf->Cell(5,0,'',1,0);
$pdf->Cell(35,5,'Surname ',1,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,0,'',1,0);
$pdf->Cell(35,5,'First Name ',1,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,0,'',1,0);
$pdf->Cell(35,5,'Team ',1,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,0,'',1,0);
$pdf->Cell(35,5,'Caution Code ',1,0,'L');
//Dummy Cell for formatting
$pdf->Cell(5,0,'',1,0);
$pdf->Cell(35,5,'Send Off Code ',1,1,'L');





















}





//Outputs the data
$pdf->Output('D','matchReport.pdf');
?>