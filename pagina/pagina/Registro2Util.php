<?php
require_once('datos/daoUsuarios2.php');
require_once('modelos/usuario.php');

$usuario = new Usuario();

$valNombre = $valcorreo = $valcontrasena = $valtipousuario = "";

if (count($_POST) == 1 && isset($_POST["id"]) && is_numeric($_POST["id"])) {
  //Obtener la info del usuario con ese id
  $dao = new DAOUsuarioAU();
  $usuario = $dao->obtenerUno($_POST["id"]);
} elseif (count($_POST) > 1) {
  $valNombre = $valcorreo = $valContrasena = $valtipousuario  = "is-invalid";
  $valido = true;

  if (
    isset($_POST["nombre"]) &&
    (strlen(trim($_POST["nombre"])) > 7 && strlen(trim($_POST["nombre"])) < 35) &&
    preg_match("/^[a-zA-Z.\s]+$/", $_POST["nombre"])
  ) {
    $valNombre = "is-valid";
  } else {
    $valido = false;
  }

  if (isset($_POST["correo"]) && filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
    $valcorreo = "is-valid";
  } else {
    $valido = false;
  }

  if (isset($_POST["contrasena"]) &&
  (strlen(trim($_POST["contrasena"])) > 5 && strlen(trim($_POST["contrasena"])) < 15)
  ) {
    $valContrasena = "is-valid";
  } else {
      $valido = false;
  }




  if (isset($_POST["usuario"])) {
    $valtipousuario = "is-valid";
  } else {
    $valido = false;
  }


  $usuario->id = isset($_POST["Id"]) ? trim($_POST["Id"]) : 0;
  $usuario->nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
  $usuario->correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : "";
  $usuario->contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";
  $usuario->tipo = isset($_POST["usuario"]) ? $_POST["usuario"] : "Administrador";

  // var_dump($valido);
  if ($valido) { // true

    //Usar el método agregar del dao
    $dao = new DAOUsuarioAU();

    if ($usuario->id == 0) {    //TRUE
      if ($dao->agregara($usuario) == 0) {     //TRUE
    //    echo('Guardo');
      } else {
        //Al finalizar el guardado redireccionar a la lista
        header("Location: GestionUsuarios.php");
      }
    } else {
      
     // echo('jhukfcnuwe');
      if ($dao->editar($usuario)) {
      // echo('jhukfcnuwe');
        $_SESSION["msj"] = "success-El usuario ha sido almacenado exitósamente";
        //Al finalizar el guardado redireccionar a la lista
        header("Location: GestionUsuarios.php");
      } else {
        $_SESSION["msj"] = "danger-Error al intentar guardar";
      }
    }
  }else{
    
  }
}
