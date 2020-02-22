<?php

session_start();

include "fpdf/fpdf.php";

if(!$_SESSION) {
	header('Location: ./index.php');
}

$pdf = new FPDF($orientation='P',$unit='mm', array(45,90));
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
$textypos = 5;
$pdf->setY(2);
$pdf->setX(2);
$pdf->Cell(5,$textypos,$_SESSION['id_pedido']);
$textypos+=10;
$pdf->setX(2);
$pdf->Cell(5,$textypos,"FOOD GO");
$pdf->SetFont('Arial','',5);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=6;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'-------------------------------------------------------------------');
$textypos+=6;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'UNID.  ALIMENTO       PRECIO               TOTAL');

$total = 0;
$off = $textypos+6;

//Son los alimentos que el usuario añadió al carrito
$alimentos = $_SESSION['pedido'];
$carrito = $_SESSION['carrito'];

for($i = 0; $i < count($alimentos); $i++) {
$pdf->setX(2);
$pdf->Cell(5,$off,$carrito[$i]->unidades);
$pdf->setX(6);
$pdf->Cell(35,$off,  strtoupper(substr($alimentos[$i]["nombre"], 0,12)) );
$pdf->setX(20);
$pdf->Cell(11,$off,  "$".number_format($alimentos[$i]["precio"],2,".",",") ,0,0,"R");
$pdf->setX(32);
$pdf->Cell(11,$off,  "$ ".number_format($carrito[$i]->unidades * $alimentos[$i]["precio"],2,".",",") ,0,0,"R");

$total += ($alimentos[$i]['precio'] * $carrito[$i]->unidades);
$off+=6;

}


$textypos=$off+6;

$pdf->setX(2);
$pdf->Cell(5,$textypos,"TOTAL: " );
$pdf->setX(38);
$pdf->Cell(5,$textypos,"$ ".number_format($total,2,".",","),0,0,"R");

$pdf->setX(2);
$pdf->Cell(5,$textypos+6,'GRACIAS POR TU COMPRA ');

$pdf->output();
