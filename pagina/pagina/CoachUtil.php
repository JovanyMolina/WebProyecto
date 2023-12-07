<?php
    require_once('datos/daoUsuario.php');


    $usuario=new Usuario();
    
    $valNombre = $valCorreo = $valContrasena  = $valContrasenaConfirmar = $valInstitucion = "" ;
    $comprobarDatos = $comprobarCorreo = false;

    

if (count($_POST) > 0) {
    $valNombre = $valCorreo = $valContrasena  = $valComfirContrasena = $valInstitucion  = "is-invalid";
    $valido = true;

    // Validación del nombre
    if (
        isset($_POST["Nombre"]) && (strlen(trim($_POST["Nombre"])) > 3 && strlen(trim($_POST["Nombre"])) < 51) &&
        preg_match("/^[a-zA-Z.\s]+$/", $_POST["Nombre"])
    ) {
        $valNombre = "is-valid";
        $nombre = ($_POST["Nombre"]);
    } else {
        $valido = false;
    }

    // Validación del correo
    if (
        isset($_POST["Email"]) &&
        filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)
    ) {
        $valCorreo = "is-valid";
        $correo = ($_POST["Email"]);
    } else {
        $valido = false;
    }

    // Validación contraseña
    if (
        isset($_POST["Contrasena"]) &&
        (strlen(trim($_POST["Contrasena"])) >= 6 && strlen(trim($_POST["Contrasena"])) < 16)
    ) {
        $valContrasena = "is-valid";
        $password = htmlspecialchars($_POST["Contrasena"]);
    } else {
        $valido = false;
    }

    // Validación de la confirmación de la contraseña
    if (
        isset($_POST["ConfirmarContrasena"]) &&
        $_POST["ConfirmarContrasena"] === $_POST["Contrasena"]
    ) {
        $valContrasenaConfirmar = "is-valid";
    } else {
        $valContrasenaConfirmar = "is-invalid";
        $valido = false;
    }

    // Institucion
    if (isset($_POST["institucion"])) {
        $valInstitucion = "is-valid";
        $institucion = htmlspecialchars($_POST["institucion"]);
        

    } else {
        $valido = false;
    }


    $usuario->id=ISSET($_POST["Id"])?trim($_POST["Id"]):0;
    $usuario->nombre=ISSET($_POST["nombre"])?trim($_POST["Nombre"]):"";
    $usuario->correo=ISSET($_POST["Email"])?trim($_POST["Email"]):"";
    $usuario->password=ISSET($_POST["Contrasena"])?trim($_POST["Contrasena"]):"";
  


/*
    // Tipo de usuario
    if (isset($_POST["usuario"])) {
        $valTipoUsuario = "is-valid";
        $tipo = htmlspecialchars($_POST["usuario"]);
    } else {
        $valido = false;
    }*/
    //Verificar qe el correo no se repita en la base de datos
    if ($valido) {

  //Usar el método agregar del dao
  $dao= new DAOUsuario();
/*
        $consulta = "INSERT INTO usuarios (nombre, correo, password, institucion ,tipo)
                      VALUES('$nombre', '$correo', '$password', '$institucion','Coach')";
        $resultado  = mysqli_query($conexion, $consulta);
        if ($resultado) {
            $comprobarDatos = true;
            mysqli_close($conexion);
            
        } else {
            $comprobarDatos = false;
            
        }
    }*/

    if($usuario->id==0){
        if($dao->agregar($usuario)==0){
            $_SESSION["msj"]="danger-Error al intentar guardar";
        }else{
            $_SESSION["msj"]="success-El usuario ha sido almacenado exitósamente";
            //Al finalizar el guardado redireccionar a la lista
            header("Location: index.php");
        }
    }else{

    }
}
}
?>