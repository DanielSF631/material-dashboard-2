<?php
  // Datos de conexión a la base de datos
  $servidor = "localhost";
  $usuario = "root";
  $contrasena = "";
  $basedatos = "sisnotas";

  // Conexión a la base de datos
  $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);

  // Verificar la conexión
  if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
  }
?>
