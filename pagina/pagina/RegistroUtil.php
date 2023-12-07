<?php
require_once('datos/daoUsuarios.php');
require_once('modelos/usuario.php');

$usuario = new Usuario();

$valNombre = $valcorreo = $valcontrasena= $valcontrasenaConfirmar=$valinstitucion ="";

if(count($_POST)==1 && ISSET($_POST["id"]) && is_numeric($_POST["id"])){
    //Obtener la info del usuario con ese id
    $dao=new DAOUsuario();
    $usuario=$dao->obtenerUno($_POST["id"]);

}elseif(count($_POST)>1){
    $valNombre = $valcorreo=$valcontrasena= $valcontrasenaConfirmar=$valinstitucion ="is-invalid";
    $valido=true;

    if(ISSET($_POST["nombre"]) && 
      (strlen(trim($_POST["nombre"]))>3 && strlen(trim($_POST["nombre"]))<51) &&
        preg_match("/^[a-zA-Z.\s]+$/",$_POST["nombre"])){
        $valNombre="is-valid";
    }else{
        $valido=false;
    }

    if(ISSET($_POST["correo"]) && filter_var($_POST["correo"],FILTER_VALIDATE_EMAIL)){
            $valcorreo="is-valid";
    }else{
            $valido=false;
    }

    if(ISSET($_POST["contrasena"]) ){
      $contrasena = "is-valid";
    }else{
      $valido=false;
    }
    
/*
    if(ISSET($_POST["contrasenaConfirmar"]) && 
    (strlen(trim($_POST["contrasenaConfirmar"]))>=6 && strlen(trim($_POST["contrasenaConfirmar"]))<25)){
      $valPassword="is-valid";
    }else{
      $valido=false;
    }
*/
    if(ISSET($_POST["institucion"]) ){
        $valinstitucion="is-valid";
    }else{
        $valido=false;
    }


    $usuario->id=ISSET($_POST["Id"])?trim($_POST["Id"]):0;
    $usuario->nombre=ISSET($_POST["nombre"])?trim($_POST["nombre"]):"";
    $usuario->correo=ISSET($_POST["correo"])?trim($_POST["correo"]):"";
    $usuario->contrasena=ISSET($_POST["contrasena"])?trim($_POST["contrasena"]):"";
    // $usuario->contrasenaConfirmar=ISSET($_POST["contrasenaConfirmar"])?trim($_POST["contrasenaConfirmar"]):"";
    $usuario->institucion=ISSET($_POST["institucion"])?$_POST["institucion"]:"";
    $usuario->tipo=ISSET($_POST["tipo"])?$_POST["tipo"]:"Coach";


    if($valido){// true
        
        //Usar el método agregar del dao
        $dao= new daoUsuario();

        if($usuario->id==0){    //TRUE
        //  var_dump($dao->agregar($usuario)==0);

          if($dao->agregar($usuario)==0){     //TRUE
              //  alert("danger-Error al intentar guardar");
          }else{
            //alerta("success-El usuario ha sido almacenado exitósamente");
              //Al finalizar el guardado redireccionar a la lista
              header("Location: index.php");
          }
      }else{
          if($dao->editar($usuario)){
            
              $_SESSION["msj"]="success-El usuario ha sido almacenado exitósamente";
              //Al finalizar el guardado redireccionar a la lista
              header("Location: index.php");
          }else{
              $_SESSION["msj"]="danger-Error al intentar guardar";
          }
      }
    }      
  }

?>