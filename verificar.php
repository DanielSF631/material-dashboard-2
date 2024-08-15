<?php
session_start();

 // Incluir el archivo de conexión a la base de datos
  include("php/bd.php");

  // Verificar si el formulario ha sido enviado
 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['usuario'];
    $password = $_POST['contrasena'];

    // Consulta para verificar las credenciales
    $query = "SELECT * FROM estudiantes  WHERE usuario='$username' AND contrasena='$password'";
    $resultado = mysqli_query($conexion, $query);

    $querys = "SELECT * FROM docentes  WHERE usuario='$username' AND contrasena='$password'";
    $resultados = mysqli_query($conexion, $querys);

     $q = "SELECT * FROM admin  WHERE usuario='$username' AND contrasena='$password'";
    $r = mysqli_query($conexion, $q);

    // Verificar si se encontró un registro con las credenciales ingresadas
    if (mysqli_num_rows($resultado) == 1) {
        // Iniciar sesión y redirigir al panel de control
        session_start();
        $estudiante = mysqli_fetch_assoc($resultado);
          $_SESSION['username'] = $username;
          $_SESSION['id'] = $estudiante['id_estudiante'];
          
			    $_SESSION['nombres'] = $estudiante['nombres'];
			    $_SESSION['apellidos'] = $estudiante['apellidos'];
			    $_SESSION['ci'] = $estudiante['ci'];
			     $_SESSION['rol'] = $estudiante['rol'];

        header("Location: misDatos.php");
        exit();
        }elseif (mysqli_num_rows($resultados) == 1) {
        		session_start();
        $docente = mysqli_fetch_assoc($resultados);
          $_SESSION['username'] = $username;
          $_SESSION['id'] = $docente['id_docentes'];
			    $_SESSION['nombres'] = $docente['nombres'];
			    $_SESSION['apellidos'] = $docente['apellidos'];
			    $_SESSION['ci'] = $docente['ci'];
			     $_SESSION['rol'] = $docente['rol'];

        header("Location: misDatos.php");
        exit();

    } elseif (mysqli_num_rows($r) == 1) {
                session_start();
        $admin = mysqli_fetch_assoc($r);
          $_SESSION['username'] = $username;
          $_SESSION['id'] = $admin['id_admin'];
                $_SESSION['nombres'] = $admin['nombres'];
                $_SESSION['apellidos'] = $admin['apellidos'];
                $_SESSION['ci'] = $admin['ci'];
                $_SESSION['celular'] = $admin['celular'];
                 $_SESSION['rol'] = $admin['rol'];

        header("Location: menu.php");
        exit();

    } else {
        // Mostrar mensaje de error si las credenciales son inválidas
        header("Location: login.php?error=1");
    }

}
?>