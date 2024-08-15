<?php 
session_start();
include("../php/bd.php");
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

    
  

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
  Pagos
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    



</head>

<body class="g-sidenav-show  bg-gray-200">
      <script type="text/javascript">
// Tiempo en milisegundos antes de que se cierre automáticamente la sesión (por ejemplo, 30 minutos).
const tiempoInactivo = 15 * 60 * 1000; 

let tiempoUltimaActividad = new Date().getTime();

function reiniciarTemporizador() {
  tiempoUltimaActividad = new Date().getTime();
}

function comprobarInactividad() {
  const tiempoActual = new Date().getTime();
  const tiempoInactivoActual = tiempoActual - tiempoUltimaActividad;

  if (tiempoInactivoActual >= tiempoInactivo) {
    // Cerrar la sesión o realizar otras acciones necesarias.
    // Por ejemplo, redirigir a una página de cierre de sesión.
    window.location.href = "../logout.php";
  } else {
    // Volver a comprobar después de un intervalo.
    setTimeout(comprobarInactividad, tiempoInactivo - tiempoInactivoActual);
  }
}

// Iniciar el seguimiento de actividad y el temporizador.
document.addEventListener("mousemove", reiniciarTemporizador);
document.addEventListener("keydown", reiniciarTemporizador);

// Inicializar la primera comprobación de inactividad.
comprobarInactividad();

</script>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"> Dashboard </span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
              <?php if($_SESSION['rol']==1){?>
        <li class="nav-item">
          <a class="nav-link text-white " href="../menu.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Menu</span>
          </a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link text-white " href="../misDatos.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Mis Datos</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link text-white  " href="./docentes.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Docentes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="./estudiantes.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment_ind</i>
            </div>
            <span class="nav-link-text ms-1">Estudiantes</span>
          </a>
        </li>
           <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle active bg-gradient-primary" href="#" id="submenu1" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons opacity-10" >attach_money</i>Caja</a>
                    <ul class="dropdown-menu" aria-labelledby="submenu1">
                        <li><a class="dropdown-item" href="./pagos.php">Pagos / Ingresos</a></li>
                        <li><a  class="dropdown-item"  href="./egresos.php">Egresos</a></li>
                         <li><a class="dropdown-item" href="./#">Reporte Ingresos</a></li>
                        <li><a  class="dropdown-item"  href="./#">Reporte Egresos</a></li>
                    </ul>
                </li>
         
      

         <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle " href="#" id="submenu1" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons opacity-10" >assignment</i>Asignaciones</a>
                    <ul class="dropdown-menu" aria-labelledby="submenu1">
                        <li><a class="dropdown-item" href="./asgEstu.php">Estudiantes</a></li>
                        <li><a  class="dropdown-item"  href="./asgDoc.php">Docentes</a></li>
                        
                    </ul>
                </li>
 
                    <?php }?>
       
  
        <li class="nav-item">
          <a class="nav-link text-white " href="../logout.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Salir</span>
          </a>
        </li>
     
      </ul>
    </div>
  
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Menu</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tabla</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Ingresos / Cobro Mensualidades</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
           <?php
                      $hoy = date("Y-m-d");
                  $cons = "SELECT id_gestion FROM gestion WHERE fecha_fin < '$hoy' AND estado = 1";
                  $resultado = $conexion->query($cons);

                  if ($resultado->num_rows > 0) {
                      // La gestión actual ha vencido
                      // Deshabilita la gestión actual
                      $query = "UPDATE gestion SET habilitada = 0 WHERE fecha_fin < '$hoy' AND habilitada = 1";
                      $conexion->query($query);
                      
                      // Habilita la siguiente gestión
                      $query = "UPDATE gestion SET habilitada = 1 WHERE fecha_inicio > '$hoy' LIMIT 1";
                      $conexion->query($query);
                  }

                  $qq = "SELECT nombre_gestion FROM gestion WHERE estado = 1";
            $resultado = $conexion->query($qq);

            if ($resultado->num_rows > 0) {
                $gestion_actual = $resultado->fetch_assoc();
                //echo "Gestión Actual: " . $gestion_actual['nombre_gestion'];
                $ges=$gestion_actual['nombre_gestion'];
            } else {
                echo "No hay gestión habilitada.";
            }
            ?>
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Escriba...</label>
              <input type="label" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?php echo "Gestion"," ",$ges;?></span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
   



    <div class="container-fluid py-4">
     
     <form method="post" action="">
        <label>Codigo Estudiante: <input type="text"  name="dni"></label>
        <input type="submit" class="btn btn-info" value="Buscar">
    </form>
   
      <script>
        function validarFormulario() {
            var campo1 = document.getElementById('total_monto').value;
            var campo2 = document.getElementById('cuotas_seleccionadas').value;

            if (campo1 === '' || campo2 === '') {
                alert('Ambos campos deben estar llenos.');
                return false; // Evitar que el formulario se envíe
            }
        }
    </script>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dni = $_POST["dni"];
        
        // Conexión a la base de datos (cambiar valores según tu configuración)
       
        
        // Consulta para obtener los datos del estudiante
        $sql = "SELECT * FROM estudiantes WHERE ci = '$dni'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $estudiante_id = $row["id_estudiante"];
            $correo=$row['correo'];
            echo "<h5>Estudiante encontrado:</h5>";
            echo "Nombre: " . $row["nombres"] . " " . $row["apellidos"] . "<br>";
            echo "CI: " . $row["ci"] . "<br>";
            echo "Teléfono: " . $row["ci"] . "<br>";
             echo "Correo: " . $row["correo"] . "<br>";

              
            // Consulta para obtener las cuotas pendientes de este estudiante
    



$query = "SELECT * FROM estudiantes WHERE id_estudiante = $estudiante_id";
$resultado_estudiante = mysqli_query($conexion, $query);



$query = "SELECT * FROM pagos WHERE id_estudiante = $estudiante_id";
$resultado_pagos = mysqli_query($conexion, $query);

$consulta_gestion = "SELECT * FROM gestion WHERE estado = 1";
$resultado_gestion = $conexion->query($consulta_gestion);
$gestion = $resultado_gestion->fetch_assoc();


$query = "SELECT * FROM cuotas  WHERE id_gestion = " . $gestion['id_gestion'];
$resultado_cuotas = mysqli_query($conexion, $query);
  
  echo "<form id='reportForm' method='post' action='cobro.php' target='_blank' onsubmit='return validarFormulario()'>";
   echo "<input type='hidden' name='estudiante_id' value=".$estudiante_id.">";
    echo "<div class='container-fluid py-4'>";
      echo  "<div class='row'>";
      echo "<div class='col-12'>";
        echo "<div class='card my-4'>";
         echo  "<div class='card-header p-0 position-relative mt-n4 mx-3 z-index-2'>";
             echo "<div class='bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3'>";
            echo   "<h6 class='text-white text-capitalize ps-3'>Cobro Cuota(s)</h6>";
             echo "</div>";
           echo "</div>";
           echo "<div class='card-body px-0 pb-2'>";
              echo "<div class='table-responsive p-0'>";
        echo "<table class='table align-items-center mb-0'>";
          echo "<thead>";
            echo "<tr>";
                echo "<th  class='text-uppercase text-primary  text-xxs font-weight-bolder opacity-8'>Cuotas</th>";
                 echo "<th  class='text-uppercase text-primary  text-xxs font-weight-bolder opacity-8'>Monto</th>";
                 echo "<th  class='text-uppercase text-primary  text-xxs font-weight-bolder opacity-8'>Cobrado</th>";
                echo "<th class='text-secondary opacity-8'></th>";
            echo "</tr>";
            echo "</thead>";
            $total_cuotas = 0;
            while ($cuota = mysqli_fetch_assoc($resultado_cuotas)): 
            
            echo "<tr>";
                echo "<td scope='row'>".$cuota["nombre_cuota"]."</td>";
                echo "<td>".$cuota["monto"]."</td>";
                echo "<td>";
                   
                    $cuota_id = $cuota['id_cuota'];
                    $pagado = false;
                    while ($pago = mysqli_fetch_assoc($resultado_pagos)) {
                        $idpago=$pago['id_pagos'];
                        if ($pago['id_cuota'] == $cuota_id) {
                            $pagado = true;
                            break;
                        }
                    }
                    if ($pagado) {
                        echo ' <span class="badge badge-sm bg-gradient-success">Pagado</span>';
                    } else {
                      
                          echo '<input type="checkbox" name="cuotas_pendientes[]" value="' . $cuota_id . '">';
                    }
                    
                echo "</td>";
            echo "</tr>";

             endwhile; 
        echo "</table>";
         echo "</div>";
           echo "</div>";
               echo "</div>";
        echo "</div>";
      echo "</div>";
      echo "</div>";
       
        echo "<div class='input-container'>";
        echo "<div class='row'>";
        echo "<input type='hidden' name='id_pago' value=".$idpago.">";

          echo "<div class='col-md-3'>";
         echo "<h5>Total a Pagar</h5>";
        echo "<input type='text' id='total_monto' name='total_monto' value='0' disabled >";

         echo "</div>";
             echo "<div class='col-md-3'>";
        echo "<h5>Enviar</h5>";
        echo "<input type='text' id='correo' name='correo' value=".$correo." disabled >";

          echo "</div>";
          echo "<div class='col-md-6'>";
        echo "<h5>Cuotas Selecionadas</h5>";
        echo "<input type='text' id='cuotas_seleccionadas' name='cuotas_seleccionadas' disabled >";
        echo "<button type='submit' >Registrar Pagos</button>";
        echo "</div>";
      echo "</div>";
          
    echo "</div>";
    echo "</form>";






        } else {
            echo "<p>No se encontró ningún estudiante con ese Codigo.</p>";
        }
        
       
    }

    ?>
 
<script>
        // JavaScript para actualizar la página principal después de generar el informe
        document.getElementById("reportForm").addEventListener("submit", function() {
            setTimeout(function() {
                location.reload();
            }, 1000); // Espera 1 segundo antes de recargar la página
        });
</script>
    <script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const totalMontoInput = document.getElementById('total_monto');
        const cuotasSeleccionadasInput = document.getElementById('cuotas_seleccionadas');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                let totalMonto = 0;
                const cuotasSeleccionadas = [];
                
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        totalMonto += parseFloat(checkbox.parentElement.previousElementSibling.textContent);
                        cuotasSeleccionadas.push(checkbox.parentElement.previousElementSibling.previousElementSibling.textContent);
                    }
                });

                totalMontoInput.value = totalMonto.toFixed(2);
                cuotasSeleccionadasInput.value = cuotasSeleccionadas.join(' ');
            });
        });
</script>
   
    <br>
    <br>
    <br>
        <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-4 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                Creado <i class="fa fa-heart"></i> por
                <a href="#" class="font-weight-bold" target="_blank">Daniel Apaza Huanca</a>
                Contacto:63141303
              </div>
            </div>
        
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn btn-outline-dark w-100" href="">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>