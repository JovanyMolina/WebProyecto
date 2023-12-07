<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estiloRegistrarEqupos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Registro y Edición de Equipos</title>

</head>
<body>
   <?php 
   session_start();
   if (!isset($_SESSION["usuario"])) {
    header("Location:index.php");
  }else{
    if($_SESSION["usuario"] == "Administrador"  || $_SESSION["usuario"] == "Coach" ){
      header("Location:index.php");
    }
  }
   
   ?>
    <div class="container">
        
        <form method="post" class="row mx-auto g-3" style="width: 40%;">
        <h1>Registro y Edición de Equipos</h1>      
        
            <div class="">
                
                    <span class="input-group-text"><i class="fas fa-users fa-2g"> Nombre del equipo</i></span>
                    <input type="text"  id="nameTeam" placeholder="Ingrese el nombre del equipo" name="nombreEquipo"
                    class="form-control <?= $valNombreEquipo ?>" required minlength="10" maxlength="35" value="<?php echo isset($_POST["nombreEquipo"]) ? $_POST["nombreEquipo"] : "" ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <li>El nombre de equipo es obligatorio</li>
                            <li>Debe contener solo letras</li>
                            <li>Debe tener entre 10 y 35 caracteres</li>
                        </ul>
                    </div>
            </div>
            
            <h2>Integrantes del Equipo</h2>
            <!--Estudiante 1-->
            <div class="">
                    <span class="input-group-text"><i class="fas fa-user fa-2g"> Estudiante 1</i></span>
                    <input type="text"  id="estudiante1" placeholder="Nombre del Estudiante" minlength="10" maxlength="25" name="EstudianteUno"
                    class="form-control <?= $valEstudiante1 ?>" required value="<?php echo isset($_POST["EstudianteUno"]) ? $_POST["EstudianteUno"] : "" ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <li>El nombre del estudiante  es obligatorio</li>
                            <li>Debe contener solo letras</li>
                            <li>Debe tener entre 10 y 25 caracteres</li>
                        </ul>
                    </div>
            </div>
            <!--Estudiante 2-->
            <div class="">
                    <span class="input-group-text"><i class="fas fa-user fa-2g"> Estudiante 2</i></span>
                    <input type="text"  id="estudiante2" placeholder="Nombre del Estudiante" minlength="10" maxlength="25" name="EstudianteDos"
                    class="form-control <?= $valEstudiante2 ?>" required value="<?php echo isset($_POST["EstudianteDos"]) ? $_POST["EstudianteDos"] : "" ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <li>El nombre del estudiante  es obligatorio</li>
                            <li>Debe contener solo letras</li>
                            <li>Debe tener entre 10 y 25 caracteres</li>
                        </ul>
                    </div>
            </div>
            <!--Estudiante 3-->
            <div class="">
                    <span class="input-group-text"><i class="fas fa-user fa-2g"> Estudiante 3</i></span>
                    <input type="text"  id="estudiante3" placeholder="Nombre del Estudiante"  name="EstudianteTres"
                    class="form-control <?= $valEstudiante3 ?>" minlength="10" maxlength="25" required value="<?php echo isset($_POST["EstudianteTres"]) ? $_POST["EstudianteTres"] : "" ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <li>El nombre del estudiante es obligatorio</li>
                            <li>Debe contener solo letras</li>
                            <li>Debe tener entre 10 y 25 caracteres</li>
                        </ul>
                    </div>
            </div>

    
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary" type="submit">Registrar equipos</button>
                <a class="btn btn-danger" role="button" href="PaginaPrincipalCoach.php">Cancelar</a>
            </div>
        </form>
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
</body>
</html>