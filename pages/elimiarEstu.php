<?php
// Conexión a la base de datos
session_start();
include("../php/bd.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Consulta para eliminar el registro
    $query = "DELETE FROM estudiantes WHERE id_estudiante = $id";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        echo "Registro eliminado correctamente.";
        header("Location: estudiantes.php");
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
        header("Location: estudiantes.php");
    }
}

// Cerrar conexión

?>
