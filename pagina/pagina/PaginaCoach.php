<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal del Coach</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="dt/Buttons-2.4.2/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" href="dt/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <?php
  session_start();
  if (!isset($_SESSION["usuario"])) {
    header("Location:index.php");
  }

  require_once('datos\daoEquipos.php');
  $dao = new DAOEquipo();
  $nombreCoach = $_SESSION["nombre"];

  $tipoUsuario = $_SESSION["tipo"];


  if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
    //Eliminar
    if ($dao->eliminar($_POST["id"])) {
      $_SESSION["msj"] = "success-El Equipo ha sido eliminado correctamente";
    } else {
      $_SESSION["msj"] = "danger-No se ha podido eliminar el equipo seleccionado";
    }
  }
  //APROBAR
  if (isset($_POST["id_Aprobar"]) && is_numeric($_POST["id_Aprobar"])) {

    if ($dao->aprobar($_POST["id_Aprobar"])) {
      $_SESSION["msj"] = "success-El Equipo ha sido eliminado correctamente";
    } else {
      $_SESSION["msj"] = "danger-No se ha podido eliminar el equipo seleccionado";
    }
  }

  //APROBAR_TODOS   id_AprobarAll
  if (isset($_POST["id_AprobarAll"])) {
    if ($dao->AprobarTodos()) {
      $_SESSION["msj"] = "success-El Equipo ha sido eliminado correctamente";
    } else {
      $_SESSION["msj"] = "danger-No se ha podido eliminar el equipo seleccionado";
    }
  }
  //DESAPROBAR
  if (isset($_POST["id_Desaprobar"]) && is_numeric($_POST["id_Desaprobar"])) {

    if ($dao->Desaaprobar($_POST["id_Desaprobar"])) {
      $_SESSION["msj"] = "success-El Equipo ha sido eliminado correctamente";
    } else {
      $_SESSION["msj"] = "danger-No se ha podido eliminar el equipo seleccionado";
    }
  }
  $listaEquipos = $dao->obtenerTodos($nombreCoach);

  ?>

  <nav class="navbar navbar-dark bg-dark fixed-top"><!--top bar-->
    <div class="container-fluid">
      <a class="navbar-brand" href="PaginaCoach.php">Coding Cup</a> <!-- nombre izquierda -->
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
          <?php 
            if($tipoUsuario=="Administrador"){
          ?>
              <li class="nav-item">
              <a class="nav-link" href="GestionUsuarios.php">Gestion de usuarios</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="Concurso1.php">Concursos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="ImprimirEquipos.php">Imprimir Equipos</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" href="CerrarSesion.php">Cerrar Sesión</a>
            </li>
          <?php } ?>
          <?php 
            if($tipoUsuario=="Auxiliar"){
          ?>
              

            <li class="nav-item">
              <a class="nav-link" href="Concurso1.php">Concursos</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="CerrarSesion.php">Cerrar Sesión</a>
            </li>
          <?php } ?>
          <?php 
            if($tipoUsuario=="Coach"){
          ?>
              

            <li class="nav-item">
              <a class="nav-link" href="PaginaCoach.php">Equipos</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="CerrarSesion.php">Cerrar Sesión</a>
            </li>
          <?php } ?>

          </ul>
        </div>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <!--CONTENIDO-->

  <div id="contenido" class="container mt-3">
    <div class="d-flex justify-content-between">
      <?php
      if ($tipoUsuario == "Coach") {
        echo '<h1>¡ Bienvenido Coach!</h1>';
        echo '<a href="RegistroEquipos.php" class="btn btn-success">Agregar</a>';
      }
      if($tipoUsuario == "Auxiliar"){
        echo '<h1>¡ Bienvenido Auxiliar!</h1>';
        
        echo "<button type='button' class='btn btn-primary' onclick='confirmarAll(this)' name='id_AprobarAll'>Aprobar a todos los equipos</button>";
      } if($tipoUsuario == "Administrador") {
        echo '<h1>¡ Bienvenido Administrador!</h1>';
      
        echo "<button type='button' class='btn btn-primary' onclick='confirmarAll(this)' name='id_AprobarAll'>Aprobar a todos los equipos</button>";

      }

      ?>

    </div>
    <table class="table table-striped table-bordered mt-5">
      <thead>
        <tr>
        
          <th>Nombre del equipo </th>
          <th>Estudiante 1</th>
          <th>Estudiante 2</th>
          <th>Estudiante 3</th>
          <th>Estado del equipo</th>
          <th>Nombre del coach</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($tipoUsuario == "Administrador" || $tipoUsuario == "Auxiliar") {
          $listaEquipos = $dao->obtenerTodosAdmin();
          foreach ($listaEquipos as $equipo) {
            echo "<tr>" .
            
              "<td>" . $equipo->nombreEquipo . "</td>" .
              "<td>" . $equipo->estudiante1 . "</td>" .
              "<td>" . $equipo->estudiante2 . "</td>" .
              "<td>" . $equipo->estudiante3 . "</td>" .
              "<td>" . $equipo->Aprobado . "</td>" .
              "<td>" . $equipo->NombreDelCoach . "</td>" .
              "<td><form method='post'>" .
              "<button formaction='RegistroEquipos.php' class='btn btn-primary' name='id' value='" . $equipo->id . "'>Editar</button>" .
              "<button type='button' class='btn btn-success' onclick='confirmarA(this)' name='id_Aprobar' value='" . $equipo->id. "'>Aprobar</button>" .
              "<button type='button' class='btn btn-danger' onclick='confirmar(this)' name='id' value='" . $equipo->id . "'>Eliminar</button>" .
              "</form></td></tr>";
          }
        } else {
          $listaEquipos = $dao->obtenerTodos($nombreCoach);
          foreach ($listaEquipos as $equipo) {
            echo "<tr>" .
             
              "<td>" . $equipo->nombreEquipo . "</td>" .
              "<td>" . $equipo->estudiante1 . "</td>" .
              "<td>" . $equipo->estudiante2 . "</td>" .
              "<td>" . $equipo->estudiante3 . "</td>" .
              "<td>" . $equipo->Aprobado . "</td>" .
              "<td>" . $equipo->NombreDelCoach . "</td>" .
              "<td><form method='post'>" .
              "<button formaction='RegistroEquipos.php' class='btn btn-primary' name='id' value='" . $equipo->id . "'>Editar</button>" .

              "<button type='button' class='btn btn-danger' onclick='confirmar(this)' name='id' value='" . $equipo->id . "'>Eliminar</button>" .
              "</form></td></tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>
  <!-- MODAL PARA LA CONFIRMACIION DE ELIMINAR -->
  <div class="modal" id="mdlConfirmacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Confirmar eliminación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Está a punto de eliminar al equipo <strong id="equipoId"></strong>
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
     <!-- MODAL PARA LA CONFIRMACION DE APROBADO -->
     <div class="modal" id="mdlConfirmacionAprobar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Aprobar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Está a punto de aprobar al equipo: <strong id="equipoIdA"></strong> 
               ¿Desea continuar?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <!--Se usa el form como POST para obtener el id-->
            <form method="post">
              
              <button class="btn btn-success" data-bs-dismiss="modal" id="btnConfirmarAprobar" name="id_Aprobar">Si, aprobar el equipo</button>
            </form>
          </div>
        </div>
      </div>
    </div>
     <!-- MODAL PARA LA CONFIRMACION DE DESAPROBADO -->
     <div class="modal" id="mdlConfirmacionDesaprobar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Desaprobar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Está a punto de desaprobar al equipo: <strong id="equipoIdDe"></strong> 
               ¿Desea continuar?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <!--Se usa el form como POST para obtener el id-->
            <form method="post">
              
              <button class="btn btn-warning" data-bs-dismiss="modal" id="btnConfirmarDesaprobar" name="id_Desaprobar">Si, desaprobar al equipo</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL PARA LA CONFIRMACION DE APROBAR A TODOS LOS EQUIPOS -->
    <div class="modal" id="mdlConfirmacionAprobarTodos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Aprobar a todos los equipos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Está a punto de aprobar a todos los equipos
               ¿Desea continuar?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <!--Se usa el form como POST para obtener el id-->
            <form method="post">
              
              <button class="btn btn-danger" data-bs-dismiss="modal" id="btnConfirmarAprobarAll" name="id_AprobarAll">Si, aprobar a todos los equipos</button>
            </form>
          </div>
        </div>
      </div>
    </div>


  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/bootstrap.bundle.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/listaUsuarios.js"></script>
    <script src="js/confirmarAprobado.js"></script>
    <script src="js/confirmarDesaprobado.js"></script>
    <script src="js/confirmarAprobarTodos.js"></script>
</body>

</html>