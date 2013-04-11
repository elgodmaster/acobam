<?php
	ini_set('session.save_handler','files');
	session_start();
		
     

require('../fpdf/fpdf.php');
include("../archivos/conexion.inc");

class PDF extends FPDF
{
//Cabecera de página
function Header()
{
    //Logo
    $this->Image('../imagenes/logooo.jpg',10,8,10);
    //Arial bold 15
    $this->SetFont('Arial','B',11);
    //Movernos a la derecha

    //Título
    $this->Cell(200,2,'ACOBAM de R.L',0,1,'C'); 
    $this->Ln(5);
	$this->Cell(200,6,'REPORTE DE EMPLEADO',0,1,'C');
	$this->Ln(5);
    //Salto de línea
    
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',10);
    //Número de página
    $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
}

}

$pdf=new PDF(); /*Se define las propiedades de la página */
$pdf->AliasNbPages();
$pdf->AddPage(); /* Se añade una nueva página */
$pdf->SetFont('Arial','B',10);/* Se define el tipo de fuente: Arial en negrita de ta */  							     							
	


$cons1 = mysql_query("SELECT  * FROM empleado  order by id_empleado",$conexion);

$lk=0;

  $pdf->SetFont('Arial','',9);


	//Títulos de las columnas
	$header=array('Nº','Login','Nombre','Apellido','Teléfono','Direcciòn');

	//Colores, ancho de línea y fuente en negrita
	$pdf->SetFillColor(255,0,0);
	$pdf->SetTextColor(255);
	$pdf->SetDrawColor(128,128,128);
	$pdf->SetLineWidth(.3);
	$pdf->SetFont('','B');
	//Cabecera
	$w=array(10,25,40,37,37,37);
	for($i=0;$i<count($header);$i++)
		$pdf->Cell($w[$i],7,$header[$i],1,0,'C',1);
	$pdf->Ln();
	//Restauración de colores y fuentes
	$pdf->SetFillColor(224,235,255);
	$pdf->SetTextColor(0);
	$pdf->SetFont('');
	//Datos
	$fill=false;
	$i=0;
	$cons1 = mysql_query("SELECT  * FROM empleado  order by id_empleado",$conexion);

	while($row = mysql_fetch_array($cons1) )
	{
	    $i++;
		$pdf->Cell($w[0],6,$i,'LR',0,'L',$fill);
		$pdf->Cell($w[1],6,$row[usuario],'LR',0,'L',$fill);
		$pdf->Cell($w[2],6,$row[nombre],'LR',0,'L',$fill);
		$pdf->Cell($w[3],6,$row[apellido],'LR',0,'L',$fill);
		$pdf->Cell($w[4],6,$row[telefono],'LR',0,'L',$fill);
		$pdf->Cell($w[5],6,$row[direccion],'LR',0,'L',$fill);
		$pdf->Ln();
		$fill=!$fill;
	}
	$pdf->Cell(array_sum($w),0,'','T');


$pdf->Output(); /* El documento se cierra y se envía al navegador */
?>