<?php

     session_start();
include("../php/bd.php");
   // Asegúrate de tener la biblioteca FPDF en la misma carpeta
date_default_timezone_set('America/La_Paz');


               if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cuotas_pendientes'])) {
        $id_estudiante = $_POST['estudiante_id'];
        
        foreach ($_POST['cuotas_pendientes'] as $cuota_id) {
            $query = "INSERT INTO pagos (id_estudiante, id_cuota, fecha_pago, cobrado) 
                      VALUES ($id_estudiante, $cuota_id, NOW(), 1)";
            mysqli_query($conexion, $query);
        }
      
    }
}

    require('../pdf/fpdf.php'); // Asegúrate de tener la biblioteca FPDF en la misma carpeta
function ConvertirALetras($numero)
{
    $valor = number_format($numero, 2, '.', '');
    $entero = intval($valor);
    $decimales = round(($valor - $entero) * 100);

    $unidad = array('','UN','DOS','TRES','CUATRO','CINCO','SEIS','SIETE','OCHO','NUEVE');
    $decena = array('','DIEZ','VEINTE','TREINTA','CUARENTA','CINCUENTA','SESENTA','SETENTA','OCHENTA','NOVENTA');
    $centena = array('','CIEN','DOSCIENTOS','TRESCIENTOS','CUATROCIENTOS','QUINIENTOS','SEISCIENTOS','SETECIENTOS','OCHOCIENTOS','NOVECIENTOS');

    $cadena = '';
    
    if ($entero == 0) {
        $cadena = 'CERO';
    }

    if ($entero > 0 && $entero < 10) {
        $cadena = $unidad[$entero];
    }

    if ($entero >= 10 && $entero < 100) {
        $cadena = $decena[substr($entero, 0, 1)];
        $cadena .= ' ' . $unidad[substr($entero, 1)];
    }

    if ($entero >= 100 && $entero < 1000) {
        $cadena = $centena[substr($entero, 0, 1)];
        $cadena .= ' ' . $decena[substr($entero, 1, 1)];
        $cadena .= ' ' . $unidad[substr($entero, 2)];
    }

    if ($entero >= 1000 && $entero < 10000) {
        $cadena = $unidad[substr($entero, 0, 1)];
        $cadena .= ' MIL';
        $cadena .= ' ' . $centena[substr($entero, 1, 1)];
        $cadena .= ' ' . $decena[substr($entero, 2, 1)];
        $cadena .= ' ' . $unidad[substr($entero, 3)];
    }

    if ($decimales > 0) {
        $cadena .= ' CON ' . $decimales . '/100  BOLIVIANOS';
    } else {
        $cadena .= ' CON 00/100  BOLIVIANOS';
    }

    return $cadena;
}
  
// Obtén los datos necesarios para el comprobante
$id_estudiante = $_POST['estudiante_id'];
$pagoid = $_POST['id_pago'];
//$nombre_estudiante = obtenerNombreEstudiante($conexion, $id_estudiante);
$cuotas_seleccionadas = $_POST['cuotas_pendientes'];
    
        

  
// Genera el PDF
$pdf = new FPDF();
$pdf->AddPage();



$pdf->Image('./img/LogoLoginCeti.jpeg', 10, 10, 30);
$pdf->Ln(13);
$pdf->SetFont('Times', 'B', 16);
$pdf->Cell(0, 10, 'Comprobante de Pago', 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Times', '', 12);

$query_estudiante = "SELECT * FROM estudiantes WHERE id_estudiante = $id_estudiante";
$resultado_estudiante = mysqli_query($conexion, $query_estudiante);
$estudiante = mysqli_fetch_assoc($resultado_estudiante);
$correo=$estudiante['correo'];

//$pdf->Cell(0, 10, 'Codigo: ' . $pagoid, 0, 1);
$pdf->Cell(0, 10, 'Estudiante: ' . $estudiante['nombres'] . ' ' . $estudiante['apellidos'], 0,1);
$pdf->Cell(0, 10, 'Fecha: ' . date('Y-m-d H:i:s'), 0,1);
//$pdf->Cell(0, 10, '', 0, 1); // Espacio
$pdf->Ln(5);


$pdf->SetFillColor(255, 0, 0);
$pdf->SetFont('Times', 'B', 12);
 
$pdf->Cell(30, 10, 'Nro',1 ,0 ,'C');
$pdf->Cell(75, 10, 'Cuota(s)',1, 0, 'C');
$pdf->Cell(40, 10, 'Costo',1,0, 'C');
$pdf->Cell(40, 10, 'Total',1,0, 'C');
$pdf->Ln();

$total_monto = 0;
$cont=1;
$pdf->SetFont('Times', '', 12);
foreach ($cuotas_seleccionadas as $cuota_id) {
    $query_cuota = "SELECT * FROM cuotas WHERE id_cuota = $cuota_id";
    $resultado_cuota = mysqli_query($conexion, $query_cuota);
    $cuota = mysqli_fetch_assoc($resultado_cuota);
       
   

     $pdf->Cell(30, 10, $cont,1,0,  'C');
    $pdf->Cell(75, 10, $cuota['nombre_cuota'],1,0, 'C');
    $pdf->Cell(40, 10, $cuota['monto'],1,0,  'C');
    $pdf->Cell(40, 10, $cuota['monto'],1,0,  'C');
   
    $pdf->Ln();

    $total_monto += $cuota['monto'];
    $to=number_format($total_monto,2);
     $cont++;
}

      $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(157, 10, 'Total de Pagos:', 0, 0, 'R');
        $pdf->Cell(40, 10, $to, 0,  'C');
         $pdf->Ln();

        $pdf->SetFont('Times', '', 8);
        $pdf->Cell(0, 10, 'SON: ' . ConvertirALetras($total_monto), 0, 1);
        $pdf->Ln(5);
$pdf->Ln(10);
$pdf->Cell(35);
$pdf->Cell(50, 10, 'Firma del Estudiante', 'T');
$pdf->Cell(37);
$pdf->Cell(50, 10, 'Firma del Encargado', 'T');

$pdf->Output();

//envia el correo

/*
$pdf->Output('comprobante_pago.pdf', 'F');

$destinatario = $correo;

// Asunto del correo
$asunto = 'Comprobante de Pago';

// Mensaje del correo
$mensaje = 'Adjunto encontrarás tu comprobante de pago.';

// Nombre del archivo adjunto (el PDF que generaste previamente)
$archivo_adjunto = 'comprobante_pago.pdf';

// Encabezados para el correo electrónico
$headers = "From: dragonussolitari@gmail.com\r\n";
$headers .= "Reply-To: dragonussolitari@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";
$headers .= "Content-Disposition: attachment; filename=\"$archivo_adjunto\"\r\n";

// Cuerpo del correo
$mensaje_correo = "--boundary\r\n";
$mensaje_correo .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
$mensaje_correo .= "Content-Transfer-Encoding: 7bit\r\n\n";
$mensaje_correo .= $mensaje . "\r\n";
$mensaje_correo .= "--boundary\r\n";
$mensaje_correo .= "Content-Type: application/octet-stream; name=\"$archivo_adjunto\"\r\n";
$mensaje_correo .= "Content-Transfer-Encoding: base64\r\n";
$mensaje_correo .= "Content-Disposition: attachment\r\n\n";
$mensaje_correo .= chunk_split(base64_encode(file_get_contents($archivo_adjunto))) . "\r\n";
$mensaje_correo .= "--boundary--";

// Enviar el correo electrónico
mail($destinatario, $asunto, $mensaje_correo, $headers);

 unlink($archivo_adjunto);*/









 
?>
