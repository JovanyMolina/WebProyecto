<?php
    require_once('datos\daoUsuarios.php');
    $dao=new DAOUsuario();
    //Verificar que llegan datos
    $usuarioNoencontrado=true;
    $valContrasena = $valCorreo  ="";
if(count($_POST)>1){
        $valContrasena = $valCorreo  ="is-invalid";
        $valido=true;

        if(ISSET($_POST["Email"]) && filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL)){
            $valCorreo="is-valid";
        }else{
            $valido=false;
        }

        if(ISSET($_POST["Contrasena"]) ){
            $valContrasena = "is-valid";
        }else{
            $valido=false;
        }

        if($valido){
        //Conectarme y buscar usuario
            $dao=new DAOUsuario();
            $usuario = $dao->autenticar($_POST["Email"],$_POST["Contrasena"]);
            if($usuario){
                
                session_start();
                $_SESSION["usuario"]=$usuario->id;
                $_SESSION["tipo"]=$usuario->tipo;
                $_SESSION["nombre"]=$usuario->nombre;
            // var_dump($usuario);
                if($_SESSION["tipo"]==="Administrador"){
                    header("Location: GestionUsuarios.php");        
                }
                elseif($_SESSION["tipo"]==="Auxiliar"){
                    header("Location: Concurso1.php");        
                }
                elseif($_SESSION["tipo"]==="Coach")
                {
                //  var_dump($usuario);
                    header("Location: paginaCoach.php");    
                }else{
                    
                }
                
            }else{
                $valContrasena = $valCorreo  ="is-invalid";
                $usuarioNoencontrado=false;
            }
        }
    }

    /*
    if(ISSET($_POST["Email"]) && ISSET($_POST["Contrasena"])){
        //Conectarme y buscar usuario
        $dao=new DAOUsuario();
        $usuario = $dao->autenticar($_POST["Email"],$_POST["Contrasena"]);
        if($usuario){
            
            session_start();
            $_SESSION["usuario"]=$usuario->id;
            $_SESSION["tipo"]=$usuario->tipo;
            $_SESSION["nombre"]=$usuario->nombre;
        // var_dump($usuario);
        if($_SESSION["tipo"]==="Administrador"){
            header("Location: GestionUsuarios.php");        
         }
        elseif($_SESSION["tipo"]==="Auxiliar"){
            header("Location: Concurso.php");        
        }
        elseif($_SESSION["tipo"]==="Coach")
        {
          //  var_dump($usuario);
            header("Location: paginaCoach.php");    
        }
        }else{

        } 


        return;
    }
    */

?>