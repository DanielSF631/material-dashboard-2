<?php
// obtener_datos_usuario.php
session_start();
include("../php/bd.php");


if (isset($_POST['materia_id'])) {
    $materia_id = $_POST['materia_id'];
   /* $sql = "SELECT * FROM asigmateriaestu WHERE id_materia = $materia_id";
    $resultado = $conexion->query($sql);*/

               // Paso 2: Obtener la lista de estudiantes y sus calificaciones para una materia específica
    // Supongamos que tienes una variable $materia_id que contiene el ID de la materia que deseas mostrar

   /* $sql = "SELECT e.id_estudiante,e.nombres, e.apellidos  ,mat.id_materia,mat.nombre,
                  (SELECT nota FROM calificaciones WHERE id_estudiante = e.id_estudiante AND id_materia = m.id_materia AND bimestre3 = 1) AS bimestre1,
                (SELECT nota FROM calificaciones WHERE id_estudiante = e.id_estudiante AND id_materia = m.id_materia AND bimestre3 = 2) AS bimestre2,
                (SELECT nota FROM calificaciones WHERE id_estudiante = e.id_estudiante AND id_materia = m.id_materia AND bimestre3 = 3) AS bimestre3
              FROM asigmateriaestu AS ame
              INNER JOIN estudiantes AS e ON ame.id_estudiante = e.id_estudiante
              INNER JOIN calificaciones AS c ON c.id_materia = ame.id_materia
              INNER JOIN materias AS m ON ame.id_materia= m.id_materia
              WHERE ame.id_materia = $materia_id AND e.id_estudiante = c.id_estudiante";*/

               /* $sql = "SELECT e.nombre AS estudiante, m.nombre_materia AS materia,
                (SELECT nota FROM calificaciones WHERE id_estudiante = e.id_estudiante AND id_materia = m.id_materia AND bimestre = 1) AS bimestre1,
                (SELECT nota FROM calificaciones WHERE id_estudiante = e.id_estudiante AND id_materia = m.id_materia AND bimestre = 2) AS bimestre2,
                (SELECT nota FROM calificaciones WHERE id_estudiante = e.id_estudiante AND id_materia = m.id_materia AND bimestre = 3) AS bimestre3
                FROM estudiantes e, materias m";


                  $query = "SELECT estudiantes.nombre AS estudiante, materias.nombre AS materia, 
                  SUM(CASE WHEN calificaciones.bimestre = 1 THEN calificaciones.nota ELSE 0 END) AS bimestre_1,
                  SUM(CASE WHEN calificaciones.bimestre = 2 THEN calificaciones.nota ELSE 0 END) AS bimestre_2,
                  SUM(CASE WHEN calificaciones.bimestre = 3 THEN calificaciones.nota ELSE 0 END) AS bimestre_3
                  FROM calificaciones
                  INNER JOIN asignaciones ON calificaciones.id_estudiante = asignaciones.id_estudiante AND calificaciones.id_materia = asignaciones.id_materia
                  INNER JOIN estudiantes ON asignaciones.id_estudiante = estudiantes.id
                  INNER JOIN materias ON asignaciones.id_materia = materias.id
                  GROUP BY estudiantes.id, materias.id";*/

          $sql = "SELECT e.id_estudiante,e.nombres, e.apellidos , c.bimestre1, c.bimestre2, c.bimestre3 ,mat.id_materia,mat.nombre
              FROM asigmateriaestu AS ame
              INNER JOIN estudiantes AS e ON ame.id_estudiante = e.id_estudiante
              INNER JOIN calificaciones AS c ON c.id_materia = ame.id_materia
              INNER JOIN materias AS mat ON ame.id_materia= mat.id_materia
              WHERE ame.id_materia = $materia_id AND e.id_estudiante = c.id_estudiante";

        $resultado = $conexion->query($sql);
        $ress = $conexion->query($sql);
       $res = $ress->fetch_assoc();
           
        

        // Verifica si el usuario ha iniciado sesión y si existe la variable de tiempo de última actividad
if (isset($_SESSION['last_activity'])) {
    // Define el tiempo máximo de inactividad en segundos (15 minutos en este ejemplo)
    $max_inactive_time = 900;

    // Calcula el tiempo transcurrido desde la última actividad
    $elapsed_time = time() - $_SESSION['last_activity'];

    // Comprueba si ha pasado el tiempo máximo de inactividad
    if ($elapsed_time > $max_inactive_time) {
        // Cierra la sesión actual y redirige al usuario a la página de inicio de sesión
        session_unset();
        session_destroy();
        header('Location: ../login.php');
        exit();
    }

    // Si el usuario sigue activo, actualiza el tiempo de última actividad
    $_SESSION['last_activity'] = time();
    }
   
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<body>
   <h4>Materia: <?php echo $res['nombre']; ?></h4>
     <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nro</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IDMat</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Estudiantes</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bimestre 1</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bimestre 2</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bimestre 3</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nota Final</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opciones</th>
                      
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <?php 
                  $con=1;
                     while($row = $resultado->fetch_assoc()) { 

                         $ides=$row['id_estudiante'];
                        $idmat=$row['id_materia'];
                         $estudiante_nombre = $row['nombres'];
                         $apellidos=$row['apellidos'];
                            $bimestre1 = $row["bimestre1"];
                            $bimestre2 = $row["bimestre2"];
                            $bimestre3 = $row["bimestre3"];
                           $promedio_materia = ($bimestre1 + $bimestre2 + $bimestre3) / 3;
                    ?>
                  <tbody>
                    <tr data-id="<?php echo $ides; ?>">
                       
                      <td>
                        <div class="d-flex px-2 py-1">
                         
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $con; ?></h6>
                           
                          </div>
                        </div>
                      </td>
                         <td>
                       <h6 class="mb-0 text-sm"><?php echo $idmat; ?></h6>
                      </td>
                      <td>
                       <h6 class="mb-0 text-sm"><?php echo $estudiante_nombre ,"  ", $apellidos; ?></h6>
                      </td>
                      
                       <td contenteditable="true">
                        <p class="text-xs font-weight-bold mb-0" contenteditable ><?php echo $bimestre1;?></p>
                        
                      </td>
                      <td class="align-middle text-center text-sm" contenteditable="true" >
                        <span class="text-secondary text-xs font-weight-bold " contenteditable ><?php echo $bimestre2; ?></span>
                      </td>
                      <td class="align-middle text-center" class='editable'>
                        <span class="text-secondary text-xs font-weight-bold " contenteditable><?php echo $bimestre3; ?></span>
                      </td>
                      <?php if($promedio_materia >=51){ ?>
                      <td class="align-middle text-center">
                        <span class="badge badge-sm bg-gradient-success" ><?php echo number_format($promedio_materia, 0);?></span>
                      </td>
                      <?php }?>
                        <?php if($promedio_materia<=51){ ?>
                      <td class="align-middle text-center">
                        <span class="badge badge-sm bg-gradient-danger"><?php echo number_format($promedio_materia, 0);?></span>
                      </td>
                      <?php }?>
                    
                      <td class="align-middle text-center text-sm">
                        
                        <!--<button  class="ver-estudiante btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-estu-id="<?php echo $ides; ?>"><i class="material-icons text-sm">add</i>Calificar</button>-->
                        <button class='edit-btn btn btn-warning'  >Calificar</button>
                      </td>
                      
                    </tr>
                   <?php $con++; }?>
                  </tbody>
                </table>
            </div>
      

         <script type="text/javascript">
         /* function mostrarEstudiante(Ides) {
            $.ajax({
                url: "acnotas.php",
                method: "POST",
                data: { ides: Ides },
                success: function(response) {
                    $("#estudiante-list").html(response);
                    $("#exampleModal").css("display", "block");
                }
            });
        }

        // Evento de clic en el botón "Ver Estudiantes"
        $(".ver-estudiante").click(function() {
            var Ides = $(this).data("estu-id");
            mostrarEstudiante(Ides);
        });

       */
        </script>
        <!-- Modal -->




       <div id="edit-modal" style="display:none;" align="center" >
       
        <h2>Calificar </h2>
        <input type="hidden" id="edit-id">
           <label>ID Materia:</label>
        <input type="text" id="edit-idm" align="left"  disabled ><br>
        <label>Estudiante:</label>
        <input type="text" id="edit-nombres" align="left"  disabled ><br>
        <label>Bimestre 1:</label>
        <input type="text" id="edit-nombre"><br>
        <label>Bimestre 2:</label>
        <input type="text" id="edit-correo"><br>
         <label>Bimestre 3:</label>
        <input type="text" id="edit-bimestre"><br>
        <!-- Agrega más campos para otros campos si es necesario -->
        <button id="save-btn" class="btn btn-success">Guardar cambios</button>
        <button id="cancel-btn" class="btn btn-danger">Cancelar</button>
        
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            // Variable para almacenar el ID del registro seleccionado
            var selectedId;
             // var selectedIdm;

            // Asignar evento de clic a los botones de editar
            $('.edit-btn').on('click', function () {
                var row = $(this).closest('tr');
                selectedId = row.data('id');
                //selectedIdm = row.data('idm');
                var idm = row.find('td:eq(1)').text();
                var nombres = row.find('td:eq(2)').text();
                var nombre = row.find('td:eq(3)').text();
                var correo = row.find('td:eq(4)').text();
                var bimestre = row.find('td:eq(5)').text();

                // Rellenar los campos del modal con los datos del registro seleccionado
                $('#edit-id').val(selectedId);
                 $('#edit-idm').val(idm);
                 $('#edit-nombres').val(nombres);
                $('#edit-nombre').val(nombre);
                $('#edit-correo').val(correo);
                $('#edit-bimestre').val(bimestre);

                // Mostrar el modal
                $('#edit-modal').show();
            });

            // Asignar evento de clic al botón de guardar cambios en el modal
            $('#save-btn').on('click', function () {
                var editedData = {
                    id: $('#edit-id').val(),
                    idm: $('#edit-idm').val(),
                   nombres: $('#edit-nombres').val(),
                    nombre: $('#edit-nombre').val(),
                    correo: $('#edit-correo').val(),
                    bimestre: $('#edit-bimestre').val()
                    // Agrega más campos si es necesario
                };

                // Enviar la solicitud para actualizar el registro mediante AJAX
                $.ajax({
                    type: 'POST',
                    url: 'acnotas.php',
                    data: editedData,
                    success: function (response) {
                        // Actualizar los datos en la tabla después de la respuesta exitosa
                        var row = $('tr[data-id="' + selectedId + '"]');
                          row.find('td:eq(1)').text(editedData.idm);
                         // row.find('td:eq(2)').text(editedData.nombres);
                        row.find('td:eq(3)').text(editedData.nombre);
                        row.find('td:eq(4)').text(editedData.correo);
                        row.find('td:eq(5)').text(editedData.bimestre);
                        // Actualiza otros campos si es necesario

                        // Ocultar el modal
                        $('#edit-modal').hide();
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            // Asignar evento de clic al botón de cancelar en el modal
            $('#cancel-btn').on('click', function () {
                // Ocultar el modal
                $('#edit-modal').hide();
            });
        });
    </script>
</body>
</html>


