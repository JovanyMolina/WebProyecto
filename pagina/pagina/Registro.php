<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar coach</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estiloRegistro.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <?php

 //   require('index.php');
    require_once('datos/daoUsuarios.php');
    require_once('RegistroUtil.php');
    
    ?>



    <div class="container">
        <form method="post" class="row mx-auto g-3" style="width: 40%;">
            <h3>Registro Coach</h3>

            <!--Nombre-->
            <div class="">
                    <label for="txtNombreCompleto" class="form-label">Nombre completo</label>
                    <input type="text" id="txtNombreCompleto" class="form-control <?=$valNombre?>" 
                    name="NombreCompleto" requiered placeholder="Nombre Completo" value="<?= $usuario->nombre ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <li>El nombre es obligatorio</li>
                            
                        </ul>
                    </div>
            </div>

            <!--Correo-->
            <div class="">
                    <label for="txtCorreo" class="form-label">Correo</label>
                    <input type="email" requiered id="txtCorreo" class="form-control <?=$valcorreo?>" 
                    name="correo" placeholder="Correo" value="<?= $usuario->correo ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <li>El Correo es obligatorio</li>
                        </ul>
                    </div>
            </div>

            <!--Contraseña-->
            <div class="">
                    <label for="txtContrasena"  class="form-label">Contraseña</label>
                    <input type="password" id="txtContrasena" class="form-control <?=$valcontrasena?>" 
                    name="password" placeholder="Contraseña" requiered value="<?= $usuario->contrasena ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <li>El contraseña es obligatorio</li>
                        </ul>
                    </div>
            </div>


            <!--Institucion-->
            <div class="">
                    <label for="txtInstitucion"  class="form-label">Institucion</label>
                    <input type="text" id="txtInstitucion"required class="form-control <?=$valinstitucion?>" 
                    name="institucion" placeholder="Institucion" value="<?= $usuario->institucion ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <li>El institucion es obligatorio</li>
                        </ul>
                    </div>
            </div>
            
            <div class="d-flex justify-content-between p-4">
                <button class="btn btn-primary" formaction="/registro.php">Registrar</button>

                <a href="index.php" class="btn btn-danger">Volver</a>
            </div>
        </form>
    </div>


    <script src="js/usuario.js"></script>
</body>
</html>