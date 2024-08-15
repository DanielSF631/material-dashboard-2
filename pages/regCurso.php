<?php
include("../php/bd.php");

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$ci = $_POST["ci"];

$celular = $_POST["celular"];

$curso = $_POST["carrera"];



$sql = "INSERT INTO estucursos (nombres, apellidos, ci, celular, curso) 
VALUES ('$nombre', '$apellido', '$ci','$celular', '$curso')";

$result = $conexion->query($sql);

if ($result === TRUE) {
    $response = ["success" => true];
} else {
    $response = ["success" => false];
}



header("Content-Type: application/json");
echo json_encode($response);
?>
