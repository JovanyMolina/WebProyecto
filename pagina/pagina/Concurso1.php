<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="dt/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="dt/Buttons-2.4.2/css/buttons.bootstrap5.min.css">

  <style>
    .btn-verde {
      background-color: rgb(8, 218, 148) !important;
    }
  </style>
</head>

<body>
  <?php
  session_start();
  if (!isset($_SESSION["usuario"])) {
    header("Location:index.php");
  }else{
    if($_SESSION["tipo"] == "Coach"){
      header("Location:index.php");
    }
  }
  require_once('datos\daoConcurso.php');
  $dao = new DAOConcurso();

  //Eliminacion
  if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
    //Eliminar
    if ($dao->eliminar($_POST["id"])) {
      $_SESSION["msj"] = "success-El Equipo ha sido eliminado correctamente";
    } else {
      $_SESSION["msj"] = "danger-No se ha podido eliminar el equipo seleccionado";
    }
  }

  //ACTIVAR
  if (isset($_POST["id_Activar"]) && is_numeric($_POST["id_Activar"])) {

    if ($dao->activar($_POST["id_Activar"])) {
      $_SESSION["msj"] = "success-El Equipo ha sido eliminado correctamente";
    } else {
      $_SESSION["msj"] = "danger-No se ha podido eliminar el equipo seleccionado";
    }
  }
  //LO CONTRARIO DE ACTIVAR
  if (isset($_POST["id_Desactivar"]) && is_numeric($_POST["id_Desactivar"])) {

    if ($dao->desactivar($_POST["id_Desactivar"])) {
      $_SESSION["msj"] = "success-El Equipo ha sido eliminado correctamente";
    } else {
      $_SESSION["msj"] = "danger-No se ha podido eliminar el equipo seleccionado";
    }
  }
 
  ?>
  <nav class="navbar navbar-dark bg-dark fixed-top"><!--top bar-->
    <div class="container-fluid">
      <a class="navbar-brand" href="GestionUsuarios.php">Coding Cup</a> <!-- nombre izquierda -->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> <!--icono de la hambuerguesa -->
      </button>

      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel"> <!--para ocultar todo los submenus-->

        <div class="offcanvas-header justify-content-center">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Bienvenido </h5><!-- encabezado con su X de cierre -->
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!--Contenido del menu-->
        <div class="offcanvas-body">

          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

            <li class="nav-item">
              <a class="nav-link" href="Concurso1.php">Concursos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="PaginaCoach.php">Equipos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="CerrarSesion.php">Cerrar Sesión</a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <br>
    <br>
    <br>


    <!--Tabla-->

    <table id="lista" class="table table-striped table-bordered mt-5">

      <thead>
        <tr>
          <th>CLAVE</th>
          <th>Nombre del Concurso</th>
          <th>Fecha de Inicio</th>
          <th>Fecha final</th>
          <th>Estado</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $listaConcursos = $dao->obtenerTodos();
        foreach ($listaConcursos as $concurso) {
          echo "<tr>" .
            "<td>" . $concurso->id . "</td>" .
            "<td>" . $concurso->nombre . "</td>" .
            "<td>" . $concurso->fechaInicio . "</td>" .
            "<td>" . $concurso->fechaFin . "</td>" .
            "<td>" . $concurso->estado . "</td>" .
            "<td><form method='post'>" .
            "<button formaction='RegistroConcurso.php' class='btn btn-primary' name='id' value='" . $concurso->id . "'>Editar</button>" .
            "<button type='button' class='btn btn-warning' onclick='confirmarConcurso(this)' name='id' value='" . $concurso->id . "'>Activar Concurso</button>" .
            "<button type='button' class='btn btn-danger' onclick='confirmar(this)' name='id' value='" . $concurso->id . "'>Eliminar</button>" .
            "</form></td></tr>";
        }
        ?>
      </tbody>
    </table><br><br><br>
    <a class="btn btn-success mt-5 mb-3" href="RegistroConcurso.php">Agregar</a>

 <!-- MODAL PARA LA CONFIRMACIION DE ELIMINAR -->
  <div class="modal" id="mdlConfirmacion1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Confirmar eliminación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Está a punto de eliminar el concurso <strong id="IdConcurso"></strong>
            ¿Desea continuar?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <form method="post">
            <button class="btn btn-danger" data-bs-dismiss="modal" id="btnConfirmar" name="id">Si, continuar con la eliminación</button>
          </form>
        </div>
      </div>
    </div>
  </div>
    <!--MODAL ACTIVACION-->
    <div class="modal" id="mdlConfirmacionActivar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Confirmar Activacion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Está a punto de activar el concurso: <strong id="id_Concurso"></strong>
              ¿Desea continuar?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <form method="post">
              <button class="btn btn-danger" data-bs-dismiss="modal" id="btnConfirmarActivacion" name="id_Activar">Si, continuar con la activación</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--MODAL ACTIVACION-->
    <div class="modal" id="mdlConfirmacionDesactivacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Confirmar Desactivación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Está a punto de desactivar el concurso: <strong id="id_Desactivar"></strong>
              ¿Desea continuar?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <form method="post">
              <button class="btn btn-danger" data-bs-dismiss="modal" id="btnConfirmarDesactivacion" name="id_Desactivar">Si, continuar con la desactivación</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>



  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="dt/jQuery-3.7.0/jquery-3.7.0.min.js"></script>
  <script src="dt/DataTables-1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="dt/DataTables-1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script src="dt/Buttons-2.4.2/js/dataTables.buttons.min.js"></script>
  <script src="dt/Buttons-2.4.2/js/buttons.bootstrap5.min.js"></script>
  <script src="dt/JSZip-3.10.1/jszip.min.js"></script>
  <script src="dt/pdfmake-0.2.7/pdfmake.min.js"></script>
  <script src="dt/pdfmake-0.2.7/vfs_fonts.js"></script>
  <script src="dt/Buttons-2.4.2/js/buttons.html5.min.js"></script>
  <script src="dt/Buttons-2.4.2/js/buttons.print.min.js"></script>
  <script src="dt/Buttons-2.4.2/js/buttons.colVis.min.js"></script>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estiloAdmin.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/PaginaAdmin.js" rel="stylesheet"></script>
  <script src="js/confirmarActivacion.js"></script>
  <script src="js/listaConcursos.js"></script>
  <script src="js/confirmarDesactivacion.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>