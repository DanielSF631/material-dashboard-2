<?php
  session_start();
include("../php/bd.php");
if(isset($_GET['id'])) {
    $pago_id = $_GET['id'];

    // Conexión a la base de datos (ajusta los valores según tu configuración)
 

    // Consulta para obtener información del pago
    $query_pago = "SELECT * FROM pagos WHERE id_pagos = '$pago_id'";
    $result_pago = $conexion->query($query_pago);

    if ($result_pago->num_rows > 0) {
        require('../pdf/fpdf.php'); // Asegúrate de tener el archivo fpdf.php en el mismo directorio

        $pago = $result_pago->fetch_assoc();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Comprobante de Pago');
        $pdf->Ln();
        $pdf->Cell(40, 10, 'ID del Pago: ' . $pago['id_pagos']);
        $pdf->Cell(40, 10, 'Monto: $' . $pago['monto']);
        $pdf->Cell(40, 10, 'Fecha de Pago: ' . $pago['fecha_pago']);
        $pdf->Output();
    } else {
        echo "No se encontró el pago.";
    }

} else {
    echo "ID de pago no proporcionado.";
}
?>
