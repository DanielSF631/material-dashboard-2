<?php
// Conexión a la base de datos
session_start();
include("../php/bd.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    
    // Consulta para actualizar el registro
    $consulta = "UPDATE docentes SET nombres = '$nombre', apellidos = '$apellido', ci='$ci' WHERE id_docentes = $id";
    mysqli_query($conexion, $consulta);
    
    // Redirigir de vuelta a la lista de registros
    header("Location: docentes.php");
    exit;
}
?>
