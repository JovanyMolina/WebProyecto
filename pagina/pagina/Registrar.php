<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="Vista/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="Vista/CSS/EstiloRegistrar.css">
    <script src="Vista/JS/bootstrap.bundle.min.js"></script>

    
</head>

<body>
    <?php
        require_once('CoachUtil.php');
       
    ?>

    <div class="container">
    <form method="post" class="row mx-auto g-3" style="width: 40%;">
            <h3>Registro</h3>
            <?php
            if ($comprobarDatos) {
                echo "<script>window.location='registroExitoso.php'</script>";
                $comprobarDatos = false;
            }
            ?>
            <!--NOMBRE-->
            <div class="">
                        <label for=" txtNombre" class="form-label">Nombre:</label>

                <input type="text" id="txtNombre" name="Nombre" minlength="5" maxlength="25" class="form-control <?= $valNombre ?>
                        " placeholder="Nombre" required value="<?php echo isset($_POST["Nombre"]) ? $_POST["Nombre"] : "" ?>">
                <div class="invalid-feedback">
                    <ul>
                        <li>El nombre es obligatorio</li>
                        <li>Debe contener solo letras</li>
                        <li>Debe tener entre 5 y 25 caracteres</li>
                    </ul>
                </div>

            </div>
            <!--CORREO-->
            <div class="">
                <label for="correo" class="form-label">Correo</label>
                <div class="input-group">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg></span>
                    <input type="email" id="txtEmail" name="Email" class="form-control <?= $valCorreo ?>" placeholder="Correo electrónico" required value="<?php echo isset($_POST["Email"]) ? $_POST["Email"] : "" ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <?php
                                if($comprobarCorreo){
                                    echo "<li>El correo que intentas usar ya esta registrado</li>";
                                }else{
                                    echo "
                                    <li>El correo electrónico es obligatorio</li>
                                    <li>Debe tener un formato válido</li>
                                    ";
                                }
                            ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- CONTRASENA -->
            <div class="col-6">
                <label for="txtContrasena" class="form-label">Contraseña:</label>
                <input type="password" id="txtContrasena" minlength="6" maxlength="15" name="Contrasena" class="form-control <?= $valContrasena ?>" placeholder="Contraseña" required value="<?php echo isset($_POST["Contrasena"]) ? htmlspecialchars($_POST["Contrasena"]) : "" ?>">
                <div class="invalid-feedback">
                    <ul>
                        <li>La contraseña es requerida</li>
                        <li>Debe tener entre 6 y 15 caracteres</li>
                    </ul>
                </div>
            </div>

            <!-- CONFIRMAR CONTRASENA -->
            <div class="col-6">
                <label for="txtConfirmarContrasena" class="form-label">Confirmar Contraseña:</label>
                <input type="password" id="txtConfirmarContrasena" required name="ConfirmarContrasena" class="form-control <?= $valContrasenaConfirmar ?>" placeholder="Confirmar contraseña"  value="<?php echo isset($_POST["ConfirmarContrasena"]) ? htmlspecialchars($_POST["ConfirmarContrasena"]) : "" ?>">
                <div class="invalid-feedback">
                    <ul>
                        <li>La confirmación de la contraseña es requerida</li>
                        <li>Debe coincidir con la contraseña ingresada</li>
                    </ul>
                </div>
                <div class="valid-feedback">
                    <ul>
                        <li>Las contraseñas coinciden</li>
                    </ul>
                </div>
            </div>
            
       

            <!-- Tipo de institucion -->

            <div class="" id="divInstitucion">
                <label for="institucion" class="form-label">Institución:</label>
                <input type="text" id="txtInstitucion" name="institucion" class="form-control <?= $valInstitucion ?>" placeholder="Institucion" value="<?php echo isset($_POST["institucion"]) ? $_POST["institucion"] : "" ?>">
            </div>
            
            <div class="d-flex justify-content-between p-4">
                <button class="btn btn-primary" type="submit">Registrar</button>

                <a href="index.php" class="btn btn-danger">Volver</a>
            </div>
        </form>
    </div>

</body>

</html>