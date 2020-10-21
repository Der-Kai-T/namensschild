<?php
/*******************************************************************
							To-do-Liste
*******************************************************************/		

#     	TO DO




# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

# 		Nice to have




# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

#  		DONE





	
/*******************************************************************
							Hier geht es dann los
*******************************************************************/		
	
	
	

/*******************************************************************
							Datenbank-Abfrage
*******************************************************************/	
	include("include/times.php");
	$now = UnixToFileTime(time());
	$pdf_filename = $_POST['filename'];
	//$pdf_filename = $pdf_filename."_".$now;
	$json_sting = $_POST['namen'];
	$json_string = "[" . $json_sting . "]";
	$json_string = $json_string;
	$data = json_decode($json_string, true);
	
	/*echo bin2hex($json_string);
	echo"<br><br>";
	echo $json_string;
	echo"<br>";
	echo"<pre>";
	
	print_r($_POST);
	print_r($data);

	echo json_last_error();
	echo json_last_error_msg();
	echo "</pre>";
		
/*******************************************************************
							Debugging-Text
*******************************************************************/	
	
/*******************************************************************
							Wandle die Daten
*******************************************************************/	


			
/*******************************************************************
							Erzeuge das PDF
*******************************************************************/	
	
	
/* Erklärungen

# Cell (Breite, Höhe, Text, Rahmen, Zeilenumbruch danach?)
# Multicell erzeugt Text, der am Ende automatisch umbricht oder bei \n
# $pdf->MultiCell(110, 05, $schluss, 0, 1);
# A4: 210 mm breit, 297mm hoch


# $pdf->Cell(190,10,'Dreieicher Rollenspiel-Treffen $dc_jahr', 0,1);

# Image('Link', Pos von Links, Pos von oben, Breite)
#$pdf->Image('img/misc/ticket_freierEintritt.jpg', 10, 10, 190);
#$pdf->SetFont('Arial','',12);
#$pdf->SetXY(10,10);

$pdf->Cell(170, 10, $begruessung,0,1);
$pdf->MultiCell(110, 05, $text,0,1);
$pdf->Ln();
$pdf->MultiCell(110, 05, $schluss, 0, 1);


$pdf->Code128(140,97, $barcode, 50, 15);
$pdf->SetXY(138.5, 112); # 15px tiefer
$pdf->SetFont('Courier', '', '10');
$pdf->Write(5, "ConServer-Nr: $barcode");

$pdf->SetXY(170, 15);
$pdf->SetFont('Arial', '', '40');
$pdf->Cell(25,5, "$art",0);



$pdf->Circle(185, 98.5, 2.2);


$pdf->SetFillColor(180,180,180);
$pdf->Rect(5.25,30.25,199.5,9.5,"F");
$pdf->SetFillColor(255,255,255);



*/






//require('include/fpdf/fpdf_rotate.php');

require('include/fpdf/fpdf_barcodes.php');


class PDF_Rotate extends PDF_Code128
{
var $angle=0;

function Rotate($angle,$x=-1,$y=-1)
{
    if($x==-1)
        $x=$this->x;
    if($y==-1)
        $y=$this->y;
    if($this->angle!=0)
        $this->_out('Q');
    $this->angle=$angle;
    if($angle!=0)
    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);
        $cx=$x*$this->k;
        $cy=($this->h-$y)*$this->k;
        $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
    }
}

function _endpage()
{
    if($this->angle!=0)
    {
        $this->angle=0;
        $this->_out('Q');
    }
    parent::_endpage();
}
}


class PDF extends PDF_Rotate
{
function RotatedText($x,$y,$txt,$angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
    //Image rotated around its upper-left corner
    $this->Rotate($angle,$x,$y);
    $this->Image($file,$x,$y,$w,$h);
    $this->Rotate(0);
}
}





$pdf=new PDF('P', 'mm', 'A4');


$pdf->AddFont('MavenPro-Regular','','MavenPro-Regular.php');
$pdf->AddFont('MavenPro-Bold','B','MavenPro-Bold.php');





$pdf->SetAutoPageBreak(false);



#*******************************************************
#           Zeichne Rahmen
#*******************************************************

# x-achse links rechts
# y-achse hoch runter

#Line (start_x, start_y, ende_x, ende_y)


/*
Rot #eb003c // 235 0 60
Blau #000548 // 0 5 72

Falzmarken 99

# Image('Link', Pos von Links, Pos von oben, Breite)
			$pdf->Image('img/misc/fpdf_Logo_4c_300.jpg', 220, 19.59, 60);
*/


$border_side		= 13;
$border_top			= 10;
$falzmarke			= 99;
$img_full_width		= 2000;
$img_full_height	= 450;
$img_final_width	= 73.5;
$img_final_height	= ($img_full_height/$img_full_width)*$img_final_width;
$page_width			= 210;
$page_height		= 297;
$mm_per_pt			= 0.352778;
$pt_per_mm			= 2.83465;








$pdf->SetDrawColor(0,5,72);
$pdf->SetLineWidth(0.25);


foreach($data as $name){
	
	$pdf->AddPage();
	
	
	$z1 = utf8_decode($name['z1']);
	$z2 = utf8_decode($name['z2']);
	$z3 = utf8_decode($name['z3']);
	$z4 = utf8_decode($name['z4']);
	$z5 = utf8_decode($name['z5']);
	

	$pdf->SetTextColor(235,0,60);
	$pdf->SetFont('MavenPro-Regular','',12);

	$pdf->Line(0, $falzmarke, 5, $falzmarke);
	$pdf->Line(205, $falzmarke, 210, $falzmarke);

	$pdf->Line(0, $falzmarke*2, 5, $falzmarke*2);
	$pdf->Line(205, $falzmarke*2, 210, $falzmarke*2);

		
		


	$pdf->RotatedImage('img/juh_logo.png',$border_side + $img_final_width,$falzmarke - $border_top, $img_final_width, $img_final_height,180);
	$pdf->Image('img/juh_logo.png',$page_width -$border_side - $img_final_width,$falzmarke + $border_top, $img_final_width, $img_final_height);


	$pdf->RotatedText($page_width-$border_side,$falzmarke-$border_top, "Aus Liebe zum Leben", 180);
	$pdf->Text($border_side,$falzmarke+$border_top, "Aus Liebe zum Leben");


	$pdf->SetFont('MavenPro-Bold', 'B', 45);
	$pdf->SetTextColor(0,5,72);
	$pdf->RotatedText($page_width-$border_side,$falzmarke-$border_top-$img_final_height-16, $z1, 180);
	$pdf->Text($border_side,$falzmarke+$border_top+$img_final_height+8+($mm_per_pt*45)/2, $z1);

	$pdf->SetFont('MavenPro-Regular', '', 45);
	$pdf->RotatedText($page_width-$border_side,$falzmarke-$border_top-$img_final_height-16-($mm_per_pt	*45), $z2, 180);	
	$pdf->Text($border_side,$falzmarke+$border_top+$img_final_height+8+($mm_per_pt*45)/2+($mm_per_pt	*45), $z2, 180);	


	
	$pdf->SetTextColor(235,0,60);
	$pdf->SetFont('MavenPro-Bold','B',22);
	$pdf->Text($border_side,$falzmarke+$border_top+$img_final_height+8+($mm_per_pt*45)/2+($mm_per_pt	*45)+($mm_per_pt	*22)+8, $z3, 180);	
	
	$pdf->SetFont('MavenPro-Regular','',22);
	$pdf->Text($border_side,$falzmarke+$border_top+$img_final_height+8+($mm_per_pt*45)/2+($mm_per_pt	*45)+($mm_per_pt	*22)*2+8, $z4, 180);	
	$pdf->Text($border_side,$falzmarke+$border_top+$img_final_height+8+($mm_per_pt*45)/2+($mm_per_pt	*45)+($mm_per_pt	*22)*3+8, $z5, 180);	
}








#                        ########
#                          Ende Dokument
#                        ########










# Schreibe Kopfzeile
$pdf->SetXY(5,1);
$pdf->Write(5, "");




//$pdf->Output("tmp/$pdf_filename.pdf","F");

//$pdf->Output("name.pdf","I", true);
$pdf->Output($pdf_filename, "I", true);




#*******************************************************
#          Funktionen, die nicht eingebunden werden
#*******************************************************


?> 