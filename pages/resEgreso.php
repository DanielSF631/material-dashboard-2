<?php
include("../php/bd.php");
date_default_timezone_set('America/La_Paz');
$monto = $_POST["monto"];
$concepto = $_POST["concepto"];
$fechaHoraActual = date('Y-m-d H:i:s');

$sql = "INSERT INTO egreso (fecha, concepto, monto) 
VALUES ('$fechaHoraActual','$concepto', '$monto')";

$result = $conexion->query($sql);

if ($result === TRUE) {
    $response = ["success" => true];
} else {
    $response = ["success" => false];
}



header("Content-Type: application/json");
echo json_encode($response);
?>
