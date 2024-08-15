<?php
include("../php/bd.php");

// Configuración de la API de Moodle
//$token = '1ee5fe97dc69e9b899fba0ffae56cc35'; // Reemplaza con tu token de acceso
//$baseurl = 'https://ceetii.com/campusvirtual/webservice/rest/server.php';


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$ci = $_POST["ci"];
$exp = $_POST["exp"];
$celular = $_POST["celular"];
$correo = $_POST["correo"];
$profesion = $_POST["profesion"];
$fechaNa = $_POST["fechaNacimiento"];
$genero = $_POST["genero"];
$direccion = $_POST["direccion"];




$sql = "INSERT INTO docentes (nombres, apellidos, ci,exp, celular, correro,fecha_nacimiento,genero, direccion, profesion, usuario, contrasena, rol ) 
VALUES ('$nombre', '$apellido', '$ci','$exp', '$celular', '$correo','$fechaNa','$genero', '$direccion','$profesion', '$ci', '$ci', 2)";

$result = $conexion->query($sql);

if ($result === TRUE) {
    $response = ["success" => true];
} else {
    $response = ["success" => false];
}



header("Content-Type: application/json");
echo json_encode($response);
?>
