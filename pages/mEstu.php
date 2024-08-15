<?php
// Conexión a la base de datos
session_start();
include("../php/bd.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idE'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $exp = $_POST['exp'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $carrera = $_POST['carrera'];
    $fechaNa = $_POST['fechaNacimiento'];
    $genero = $_POST['genero'];
    $direccion = $_POST['direccion'];
    
    // Consulta para actualizar el registro
    $consulta = "UPDATE estudiantes SET nombres = '$nombre', apellidos = '$apellido', ci='$ci',exp = '$exp', celular = '$celular', correo='$correo',fecha_nacimiento = '$fechaNa' , genero='$genero',direccion='$direccion',carrera='$carrera' WHERE id_estudiante = $id";
      $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        // Éxito: redirigir de vuelta a la lista de registros con mensaje
        header("Location: estudiantes.php?mensaje=Registro actualizado con éxito");
        exit;
    } else {
        // Error: redirigir con mensaje de error
        header("Location: estudiantes.php?mensaje=Error al actualizar el registro");
        exit;
    }
}
?>
