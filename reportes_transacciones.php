<?php

include ("conectar.php");
include ("fpdf184/fpdf.php");

mysqli_set_charset($conexion,"utf8");

$consulta="select * from transaccion order by codigo";

$tabla=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($tabla);

date_default_timezone_set('America/tegucigalpa');

$hoy=date("d/m/y h:i a");

$pdf = new FPDF();

$pdf->addpage();

$pdf->Image('logo.jpeg',18,10,40);

$pdf->SetFont('Times','B',24);

$pdf->SetXY(60,10);

$pdf->Write(10,"Reporte de transaccion");

$pdf->SetFont('Times','B',18);

$pdf->SetXY(80,20);


$pdf->Write(10,$hoy);

$pdf->SetFont('Times','',8);

$pdf->SetFillcolor(204,0,0);

$pdf->SetTextColor(255,255,255);

$alt=7;

$pdf->SetXY(10,53);

$pdf->Cell(8,$alt,'No.',1,0,'C',true);
$pdf->Cell(20,$alt,'codigo',1,0,'C',true);
$pdf->Cell(20,$alt,'tipo',1,0,'C',true);
$pdf->Cell(20,$alt,'cuenta_origen',1,0,'C',true);
$pdf->Cell(20,$alt,'cuenta_destino',1,0,'C',true);
$pdf->Cell(20,$alt,'monto.',1,0,'C',true);
$pdf->Cell(20,$alt,'fecha.',1,0,'C',true);
$pdf->Cell(20,$alt,'referencia.',1,0,'C',true);
$pdf->Cell(20,$alt,'descripcion.',1,0,'C',true);
$pdf->Cell(20,$alt,'id_usuario.',1,0,'C',true);

$linea=60;

$pdf->SetTextcolor(0,0,80);

for ($n=1;$n<=$filas;$n++){
    $datos=mysqli_fetch_array($tabla,MYSQLI_ASSOC);

    if ($n%2==0){
        $pdf->SetFillColor(180,198,231);
    }
    else {
        $pdf->SetFillColor(255,255,255);
    }

    $pdf->SetXY(10,$linea);

    $pdf->Cell(8,$alt,$n,1,0,'C',true);

    $pdf->Cell(20,$alt,$datos['codigo'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['tipo'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['cuenta_origen'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['cuenta_destino'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['monto'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['fecha'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['referencia'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['descripcion'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['id_usuario'],1,0,'C',true);

    $linea+=7;

    if ($linea>264){
        $pdf->AddPage();

        $pdf->Image('logo.jpeg',18,10,40);
        $pdf->SetFont('Times','B',24);
        $pdf->SetXY(60,10);
        $pdf->Write(10,"Reporte de transaccion");
        $pdf->SetFont('Times','B',18);
        $pdf->SetXY(80,20);
        $pdf->Write(10,$hoy);

        $pdf->SetFont('Times','',8);
        $pdf->SetFillColor(204,0,0);
        $pdf->SetTextColor(255,255,255);


        $pdf->SetXY(60,33);
        $pdf->Cell(8,$alt,'No.',1,0,'C',true);
        $pdf->Cell(20,$alt,'codigo',1,0,'C',true);
        $pdf->Cell(20,$alt,'tipo',1,0,'C',true);
        $pdf->Cell(20,$alt,'cuenta_origen',1,0,'C',true);
        $pdf->Cell(20,$alt,'cuenta_destino',1,0,'C',true);
        $pdf->Cell(20,$alt,'monto',1,0,'C',true);
        $pdf->Cell(20,$alt,'fecha',1,0,'C',true);
        $pdf->Cell(20,$alt,'referencia',1,0,'C',true);
        $pdf->Cell(20,$alt,'descripcion',1,0,'C',true);
        $pdf->Cell(20,$alt,'id_usuario',1,0,'C',true);
        $linea=40;
        $pdf->SetTextColor(0,0,80);

    }
    
}




mysqli_close($conexion);


$pdf->Output('F','reportes/reporte.pdf');

$pdf->Output();


?>