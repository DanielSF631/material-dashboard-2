<?php
include("../php/bd.php");

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$ci = $_POST["ci"];
$exp = $_POST["exp"];
$celular = $_POST["celular"];
$correo = $_POST["correo"];
$carrera = $_POST["carrera"];

$fechaNa = $_POST["fechaNacimiento"];
$genero = $_POST["genero"];
$direccion = $_POST["direccion"];

$sql = "INSERT INTO estudiantes (nombres, apellidos, ci,exp, celular, correo,fecha_nacimiento,genero,direccion, carrera,semestre_actual, usuario, contrasena, rol ) 
VALUES ('$nombre', '$apellido', '$ci','$exp', '$celular', '$correo','$fechaNa','$genero','$direccion', '$carrera',1, '$ci', '$ci', 3)";

$result = $conexion->query($sql);

if ($result === TRUE) {
    $response = ["success" => true];
} else {
    $response = ["success" => false];
}



header("Content-Type: application/json");
echo json_encode($response);
?>
