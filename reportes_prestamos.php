<?php

include ("conectar.php");
include ("fpdf184/fpdf.php");

mysqli_set_charset($conexion,"utf8");

$consulta="select * from prestamos order by codigo";

$tabla=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($tabla);

date_default_timezone_set('America/tegucigalpa');

$hoy=date("d/m/y h:i a");

$pdf = new FPDF('L','mm',array(350,300));

$pdf->addpage();

$pdf->Image('logo.jpeg',18,10,40);

$pdf->SetFont('Times','B',24);

$pdf->SetXY(60,10);

$pdf->Write(10,"Reporte de prestamos");

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
$pdf->Cell(20,$alt,'id_usuario',1,0,'C',true);
$pdf->Cell(20,$alt,'monto_solicitado',1,0,'C',true);
$pdf->Cell(20,$alt,'monto_aprobado',1,0,'C',true);
$pdf->Cell(20,$alt,'plazo_meses.',1,0,'C',true);
$pdf->Cell(20,$alt,'tasa_interes.',1,0,'C',true);
$pdf->Cell(30,$alt,'motivo.',1,0,'C',true);
$pdf->Cell(20,$alt,'fecha_solicitud.',1,0,'C',true);
$pdf->Cell(20,$alt,'fecha_aprobacion.',1,0,'C',true);
$pdf->Cell(20,$alt,'fecha_inicio.',1,0,'C',true);
$pdf->Cell(20,$alt,'fecha_fin.',1,0,'C',true);
$pdf->Cell(20,$alt,'monto_pagado.',1,0,'C',true);
$pdf->Cell(20,$alt,'saldo_pendiente.',1,0,'C',true);
$pdf->Cell(20,$alt,'metodo_pago.',1,0,'C',true);
$pdf->Cell(20,$alt,'estado.',1,0,'C',true);







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
    $pdf->Cell(20,$alt,$datos['id_usuario'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['monto_solicitado'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['monto_aprobado'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['plazo_meses'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['tasa_interes'],1,0,'C',true);
    $pdf->Cell(30,$alt,$datos['motivo'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['fecha_solicitud'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['fecha_aprobacion'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['fecha_inicio'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['fecha_fin'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['monto_pagado'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['saldo_pendiente'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['metodo_pago'],1,0,'C',true);
    $pdf->Cell(20,$alt,$datos['estado'],1,0,'C',true);


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
     $pdf->Cell(20,$alt,'id_usuario',1,0,'C',true);
     $pdf->Cell(20,$alt,'monto_solicitado',1,0,'C',true);
     $pdf->Cell(20,$alt,'monto_aprobado',1,0,'C',true);
     $pdf->Cell(20,$alt,'plazo_meses.',1,0,'C',true);
     $pdf->Cell(20,$alt,'tasa_interes.',1,0,'C',true);
     $pdf->Cell(20,$alt,'motivo.',1,0,'C',true);
     $pdf->Cell(20,$alt,'fecha_solicitud.',1,0,'C',true);
     $pdf->Cell(20,$alt,'fecha_aprobacion.',1,0,'C',true);
     $pdf->Cell(20,$alt,'fecha_inicio.',1,0,'C',true);
     $pdf->Cell(20,$alt,'fecha_fin.',1,0,'C',true);
     $pdf->Cell(20,$alt,'monto_pagado.',1,0,'C',true);
     $pdf->Cell(20,$alt,'saldo_pendiente.',1,0,'C',true);
     $pdf->Cell(20,$alt,'metodo_pago.',1,0,'C',true);
     $pdf->Cell(20,$alt,'estado.',1,0,'C',true);
        $linea=40;
        $pdf->SetTextColor(0,0,80);

    }
    
}




mysqli_close($conexion);


$pdf->Output('F','reportes2/reporte.pdf');

$pdf->Output();


?>