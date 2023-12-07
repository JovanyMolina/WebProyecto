<?php
    require_once('datos/daoUsuarios.php');
    require_once('modelos/usuario.php');

    $usuario = new Usuario();
    $valNombre = $valcorreo  ="";


    if(count($_POST)>1){
        $valContrasena = $valcorreo  ="";
        $valido=true;
        
        if(ISSET($_POST["Email"]) && filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL)){
            $valcorreo="is-valid";
        }else{
            $valido=false;
        }

        if(ISSET($_POST["contrasena"]) ){
            $valContrasena = "is-valid";
        }else{
            $valido=false;
        }

        if($valido){
            
        }


    }

?>
