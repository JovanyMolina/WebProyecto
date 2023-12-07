<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Concurso</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilosRegistroConcurso.css">
    <link rel="stylesheet" href="dt/Buttons-2.4.2/css/buttons.bootstrap5.min.css">

</head>
<body>

<?php 
    session_start();
  if (!isset($_SESSION["usuario"])) {
    header("Location:index.php");
  }else{
    if($_SESSION["usuario"] == "Coach"){
      header("Location:index.php");
    }
  }
?>

<nav class="navbar navbar-dark bg-dark fixed-top"><!--top bar-->
    <div class="container-fluid">
        <a class="navbar-brand" href="PaginaAdmin.php">Coding Cup</a> <!-- nombre izquierda -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>   <!--icono de la hambuerguesa -->
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
                <a class="nav-link" href="GestionUsuarios.php">Gestion de usuarios</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="Concurso.php">Concurso</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Cerrar sesion</a>
            </li>
    
        </ul>
        </div>
        </div>
    </div>
</nav>    
    <?php
    require_once('datos\daoConcurso.php');
    require_once('RegistroConcursoUtil.php');
    ?>

    <form  method="post" style="width: 30%;">
            <!--Nombre  del evento -->
            <div class="">
                    <label for="txtNombreEvento" class="form-label">Nombre del concurso</label>
                    <input type="text" id="txtNombreEvento" required minlength="3" maxlength="30" class="form-control <?=$valNombre?>" 
                    name="nombre" placeholder="Nombre del concurso" value="<?= $concurso->nombre ?>"><!--De $usuario a evento-->
                    <div class="invalid-feedback">
                        <ul>
                            <li>El nombre del concurso es obligatorio</li>
                            <li>Su longitud debe de ser 3 a 30 caracteres</li>
                            <li>Solo se aceptan caracteres alfanumericos</li>
                        </ul>
                    </div>
            </div>

            <!--Correo inicio-->
            <div class="">
                    <label for="txtFechaInicio" class="form-label">Fecha de inicio</label>
                    <input type="date" id="txtFechaInicio" name="fechaInicio" class="form-control <?=$valFechaInicio?>"  
                    value="<?= $concurso->fechaInicio->format('Y-m-d') ?>"
                    required>
                 <div class="invalid-feedback">
                    <ul>
                        <li>La fecha de incio es obligatorio</li>
                    </ul>
                </div>
            </div>

            <!--Correo Fin-->

            <div class="">
                    <label for="txtFechaFin" class="form-label">Fecha de final</label>
                    <input type="date" id="txtFechaInicio" name="fechaFin" class="form-control <?=$ValfechaFin?>"  
                    value="<?= $concurso->fechaFin->format('Y-m-d') ?>"
                    required>
                 <div class="invalid-feedback">
                    <ul>
                        <li>La fecha de incio es obligatorio</li>
                    </ul>
                </div>
            </div>


            <div class="d-flex justify-content-between p-4">
            <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="Concurso1.php" class="btn btn-danger">Volver</a>
            </div>
    </form>

    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>