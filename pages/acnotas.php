


<?php
session_start();
include("../php/bd.php");
// Conectarse a la base de datos


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por el cliente
    $id = $_POST['id'];
     $idm = $_POST['idm'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $bimestre = $_POST['bimestre'];
    // Obtén otros campos si es necesario

    // Actualizar el registro en la base de datos
    $query = "UPDATE calificaciones SET bimestre1='$nombre', bimestre2='$correo', bimestre3='$bimestre' WHERE id_estudiante='$id' AND id_materia='$idm'";
    $result = $conexion->query($query);

    if ($result) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

//$conn->close();
?>