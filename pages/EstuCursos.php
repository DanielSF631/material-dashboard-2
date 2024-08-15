<?php 
session_start();
include("../php/bd.php");

 
       
   if(isset($_GET['codigo']) or isset($_GET['carrera'])){           
      $codigo = $_GET['codigo'];
      $carrera = $_GET['carrera'];

      $sql = "SELECT estucursos.id_cursos AS id, estucursos.nombres AS nombres,estucursos.apellidos AS apellidos, estucursos.ci AS ci, cursos.nombre_curso AS carrera_nombre
          FROM estucursos
          INNER JOIN cursos ON estucursos.curso = cursos.id_cursos
          WHERE estucursos.ci LIKE '%$codigo%' AND cursos.nombre_curso LIKE '%$carrera%' ";
            } else {
            $sql = "SELECT estucursos.id_cursos AS id, estucursos.nombres AS nombres,estucursos.apellidos AS apellidos, estucursos.ci AS ci, cursos.nombre_curso AS carrera_nombre
          FROM estucursos
          INNER JOIN cursos ON estucursos.curso = cursos.id_cursos";
        }
        $resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
   Registro de Estudiantes
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

    
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    


<style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
  }

  #paginationButtons {
    margin-top: 10px;
  }

  #paginationButtons button {
    padding: 10px;
    margin-right: 5px;
    cursor: pointer;
  }
</style>

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
          <a class="nav-link text-white " href="../pages/../misDatos.php">
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
        <!--<li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="./estudiantes.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment_ind</i>
            </div>
            <span class="nav-link-text ms-1">Estudiantes</span>
          </a>
        </li>-->
           <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle active bg-gradient-primary " href="#" id="submenu1" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons opacity-10" >assignment_ind</i>Estudiantes</a>
                    <ul class="dropdown-menu" aria-labelledby="submenu1">
                        <li><a class="dropdown-item" href="./estudiantes.php">Registro/Carrera</a></li>
                       <li><a class="dropdown-item" href="./EstuCapa.php">Registro/Capacitacion</a></li>
                        <li><a class="dropdown-item" href="./EstuCursos.php">Registro/Cursos</a></li>
                        <li><a  class="dropdown-item"  href="./pages/#">Reporte Egresos</a></li>
                    </ul>
                </li>

          <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle " href="#" id="submenu1" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons opacity-10" >attach_money</i>Caja</a>
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
          <h6 class="font-weight-bolder mb-0">Estudiantes</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Escriba...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
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
   
<div class="container">
    <h3>Registro de Estudiantes - Cursos</h3>
    <button type="button"  class="btn btn-success "  data-toggle="modal" data-target="#registroModal"><i class="material-icons text-sm">add_circle_outline</i>
        Registrar Estudiante
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="registroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="registroModalLabel">Registrar Estudiante - Cursos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de registro de estudiante -->
                <form id="miFormulario">
               <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombres</label>
                <input type="text"  id="nombre" name="nombre" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="apellido" class="form-label">Apellidos</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
        </div>
        <div class="row">
    <div class="col-md-4 mb-3">
        <label for="ci" class="form-label">CI</label>
        <input type="text" id="ci" name="ci">
    </div>

    

    <div class="col-md-4 mb-3">
        <label for="celular" class="form-label">Celular</label>
        <input type="text" id="celular" name="celular" required>
    </div>


            <?php 

              $sql = "SELECT id_cursos, nombre_curso FROM cursos";
              $result = $conexion->query($sql);
            ?>
              <div class="col-md-4 mb-3">
                <label for="inputEmail" class="form-label">Cursos</label>
                  <select   id="carrera" name="carrera" >
              <?php while ($row = $result->fetch_assoc()) { ?>
                  <option value="<?php echo $row['id_cursos']; ?>"><?php echo $row['nombre_curso']; ?></option>
              <?php } ?>
                  </select>
                </div>
</div>

        
         <!-- Nuevos campos -->
                   
                                      
                    <button type="button"  class="btn btn-success" id="enviar">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              
            </div>
        </div>
    </div>
</div>
<!-- fin modal-->

<script>

document.addEventListener("DOMContentLoaded", function() {
    const formulario = document.getElementById("miFormulario");
    const botonEnviar = document.getElementById("enviar");

    botonEnviar.addEventListener("click", function() {
        const nombre = document.getElementById("nombre").value.trim();
        const apellido = document.getElementById("apellido").value.trim();
        const ci = document.getElementById("ci").value.trim();
        const celular = document.getElementById("celular").value.trim();
        const carrera = document.getElementById("carrera").value.trim();
        

        // Validación de campos
        if (nombre === '' || apellido === '' || ci === '' || celular === '' ||  carrera === '' ) {
            alert('Todos los campos son obligatorios. Por favor, completa todos los campos.');
            return; // Detiene el proceso si hay campos vacíos
        }

        // Crear un objeto FormData para enviar los datos al servidor
        const datos = new FormData();
        datos.append("nombre", nombre);
        datos.append("apellido", apellido);
        datos.append("ci", ci);
        datos.append("celular", celular);
        datos.append("carrera", carrera);
       

        // Realizar la solicitud AJAX utilizando fetch
        fetch("regCurso.php", {
            method: "POST",
            body: datos
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Inserción exitosa");
                location.reload();
            } else {
                alert("Error en la inserción");
            }
        })
        .catch(error => {
            console.error("Error en la solicitud: ", error);
        });
    });
});



</script>

<style type="text/css">
  #miFormulario label {
    display: block;
    margin-bottom: 5px;
}

#miFormulario input[type="text"],
#miFormulario input[type="email"],
#miFormulario select,
#miFormulario textarea {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
}






</style>



  <form action="" method="GET">
        Código: <input type="text" name="codigo">
        Carrera: <input type="text" name="carrera">
        <input type="submit" value="Buscar">
        <a class="btn btn-info" href="./reportes/reporCapa.php?codigo=<?php echo $codigo; ?>&carrera=<?php echo $carrera; ?>"target="_blank">Generar Reporte PDF</a>
    </form>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Lista de Estudiantes</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>

                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nro</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombres</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">CI</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Capacitacion</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opciones</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                    <?php 
       


                  $con=1;
                     while($row = $resultado->fetch_assoc()) { 
                      $id=$row['id'];
                          $nom = $row['nombres'];
                          $ap = $row['apellidos'];
                          $ci = $row['ci'];
                          $carrera = $row['carrera_nombre'];
                    ?>
                  <tbody>
                      <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                         
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $con; ?></h6>
                           
                          </div>
                        </div>
                      </td>
                      <td>
                       <h6 class="mb-0 text-sm"><?php echo $nom," ",$ap ; ?></h6>
                      </td>
                      <td>
                       <h6 class="mb-0 text-sm"><?php echo $ci; ?></h6>
                      </td>
                        <td>
                       <h6 class="mb-0 text-sm"><?php echo $carrera; ?></h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                        
                        <a class="edit-btn  btn btn-info"  href='modEstu.php?id="<?php  echo $id; ?>"'><i class="material-icons text-sm">border_color</i></a>
                        <!--<button  class="ver-estudiantes btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-materia-id="<?php echo $materia_id; ?>"><i class="material-icons text-sm">delete_forever</i> </button>-->
                        <a class="btn btn-danger" href='elimiarEstu.php?id="<?php  echo $id; ?>"'><i class="material-icons text-sm">delete_forever</i></a>
                      </td>
                       
                        
                      
                      
                    </tr>
                   <?php $con++; }
                 ?>
                  </tbody>
                </table>
                <div id="paginationButtons">
  <button onclick="previousPage()">Anterior</button>
  <button onclick="nextPage()">Siguiente</button>
</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
  // Variables para controlar la paginación
  var currentPage = 1;
  var rowsPerPage = 10;

  // Obtén todas las filas de la tabla
  var rows = document.getElementById('tableBody').getElementsByTagName('tr');
  var totalRows = rows.length;

  // Función para mostrar las filas correspondientes a la página actual
  function showRows() {
    var start = (currentPage - 1) * rowsPerPage;
    var end = start + rowsPerPage;

    for (var i = 0; i < totalRows; i++) {
      if (i >= start && i < end) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  }

  // Función para ir a la página anterior
  function previousPage() {
    if (currentPage > 1) {
      currentPage--;
      showRows();
    }
  }

  // Función para ir a la página siguiente
  function nextPage() {
    if (currentPage < Math.ceil(totalRows / rowsPerPage)) {
      currentPage++;
      showRows();
    }
  }

  // Mostrar las filas iniciales al cargar la página
  showRows();
</script>
      
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