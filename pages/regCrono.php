<?php
include("../php/bd.php");

$nombre = $_POST["materia"];
$apellido = $_POST["descripcion"];
$ci = $_POST["fecha"];
$idDoc = $_POST["idDoc"];


$sql = "INSERT INTO cronograma (id_mat,id_docente, actividad, fecha) 
VALUES ('$nombre','$idDoc','$apellido', '$ci')";

$result = $conexion->query($sql);

if ($result === TRUE) {
    $response = ["success" => true];
} else {
    $response = ["success" => false];
}



header("Content-Type: application/json");
echo json_encode($response);
?>
