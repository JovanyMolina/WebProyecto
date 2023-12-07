<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar coach</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilosRegistrar.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    session_start();
    require_once('datos/daoUsuarios2.php');
    require_once('Registro2Util.php');
    if (!isset($_SESSION["usuario"])) {
        header("Location:index.php");
      }else{
        if($_SESSION["usuario"] == "Coach" || $_SESSION["usuario"] == "Auxiliar"){
          header("Location:index.php");
        }
      }
    ?>

<div class="container">


    <form method="post" class="row mx-auto g-3" style="width: 40%;">
            <h3>Registro Usuario</h3>
            <input type="hidden" name="Id" value="<?= $usuario->id ?>">
            <div><label for="" id='alert'></label></div>
            <?php
          /*  if ($comprobarDatos) {
                echo "<script>window.location='RegistroExitoso.php'</script>";
                $comprobarDatos = false;
            }
            */

            //var_dump($_POST);
            ?>

            <!--NOMBRE-->
            <!--Nombre-->
            <div class="">

                    <label for="txtNombreCompleto" class="form-label">Nombre completo</label>
                    <input type="text" id="txtNombreCompleto" class="form-control <?=$valNombre?>" 
                    name="nombre" required minlength="8" maxlength="35" placeholder="Nombre Completo" value="<?= $usuario->nombre ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <li>El nombre es obligatorio</li>
                            <li>El nombre debe de contener entre 8 y 35 caracteres</li>
                            <li>El nombre solo puede tener caracteres alfanumericos</li>
                        </ul>
                    </div>

            </div>
            <!--CORREO-->
            <div class="">
                <label for="txtCorreo" class="form-label">Correo</label>
                <div class="input-group">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg></span>
                    <input type="email" id="txtCorreo" name="correo" pattern="[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]{2,}" class="form-control <?= $valcorreo ?>" placeholder="Correo electrónico" required value="<?= $usuario->correo ?>">
                    <div class="invalid-feedback">
                        <ul>
                                    <li>El correo electrónico es obligatorio</li>
                                    <li>Debe tener un formato válido</li>
                                  
                           
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- CONTRASENA -->
            <div class="">
                <label for="txtContrasena" class="form-label">Contraseña:</label>
                <input type="password" minlength="6" maxlength="15" id="txtContrasena" name="contrasena" class="form-control <?= $valcontrasena ?>" 
                placeholder="Contraseña" required value="<?= $usuario->contrasena ?>">
                <div class="invalid-feedback">
                    <ul>
                        <li>La contraseña es requerida</li>
                        <li>Debe tener entre 6 y 15 caracteres</li>
                    </ul>
                </div>
            </div>

            <div class="">
                <label for="tipoUsuario" class="form-label">Tipo de usuario:</label>
                <select class="form-select <?= $valtipousuario ?>" id="usuario" name="usuario">
                    <option value="Administrador" <?= ($usuario->tipo=="Administrador")?"selected":""; ?>>Administrador</option>
                    <option value="Auxiliar" <?= ($usuario->tipo=="Auxiliar")?"selected":""; ?>>Auxiliar</option>
                </select>
                <div class="invalid-feedback">
                    <ul>
                        <li>Es obligatorio seleccionar un tipo de usuario</li>
                    </ul>
                </div>
            </div>
      
            <div class="d-flex justify-content-between p-4">
                <button class="btn btn-primary" type="submit">Registrar</button>

                <a href="GestionUsuarios.php" class="btn btn-danger">Volver</a>
            </div>
        </form>
    </div>
    <script src="js/usuario.js"></script>
</body>

</html>