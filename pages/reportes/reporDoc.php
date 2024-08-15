<?php
require('../../pdf/fpdf.php');
include("../../php/bd.php");

// Obtener valores del URL
$codigo = $_GET['codigo'];
$carrera = $_GET['carrera'];

// Crear instancia de TCPDF
$pdf = new FPDF();

// Agregar una página
$pdf->AddPage();

// Contenido del PDF
$pdf->Image('../img/LogoLoginCeti.jpeg', 10, 10, 30);
$pdf->Ln(17);
$pdf->SetFont('times', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de Docentes', 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('times', '', 12);
$pdf->Cell(30, 10, 'Nro',1 ,0 ,'C');
$pdf->Cell(75, 10, 'Nombre Completo',1, 0, 'C');
$pdf->Cell(40, 10, 'CI',1,0, 'C');
$pdf->Cell(40, 10, 'Profesion',1,0, 'C');
$pdf->Ln();

// Consulta SQL para obtener datos de estudiantes
$query = "SELECT *FROM docentes  WHERE ci LIKE '%$codigo%' AND profesion LIKE '%$carrera%'";
$resultado = mysqli_query($conexion, $query);
$cont=1;
$pdf->SetFont('Times', '', 12);
// Agregar datos a la tabla en el PDF
while ($fila = mysqli_fetch_assoc($resultado)) {
     $pdf->Cell(30, 10, $cont,1,0,  'C');
    $pdf->Cell(75, 10, $fila['nombres'].' '.$fila['apellidos'],1,0, 'C');
    $pdf->Cell(40, 10, $fila['ci'],1,0,  'C');
    $pdf->Cell(40, 10, $fila['profesion'],1,0,  'C');
    $pdf->Ln();

     $cont++;
}

// Salida del PDF
$pdf->Output();
?>
