<?php
require_once('datos\daoConcurso.php');


$concurso = new Concurso();

function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

$valNombre = $valFechaInicio=$ValfechaFin="";

if(count($_POST)==1 && ISSET($_POST["id"]) && is_numeric($_POST["id"])){
    //Obtener la info del usuario con ese id
    $dao=new DAOConcurso();
    $concurso=$dao->obtenerUno($_POST["id"]);

}elseif(count($_POST)>1){
    $valNombre = $valcorreo = $valcontrasena = $valtipousuario  ="is-invalid";
    $valido=true;

    if(ISSET($_POST["nombre"]) && 
      (strlen(trim($_POST["nombre"]))>3 && strlen(trim($_POST["nombre"]))<30) &&
        preg_match("/^[a-zA-Z.\s]+$/",$_POST["nombre"])){
        $valNombre="is-valid";
    }else{
        $valido=false;
    }

    if(ISSET($_POST["fechaInicio"]) && validateDate($_POST["fechaInicio"])){
        $fNac=DateTime::createFromFormat('Y-m-d', $_POST["fechaInicio"]);
        $h = new DateTime();
        $dif = $h->diff($fNac)->y;
        $valFechaNac="is-valid";
    }else{
        $valido=false;

    }

    if(ISSET($_POST["fechaFin"]) && validateDate($_POST["fechaFin"])){
        $fNac=DateTime::createFromFormat('Y-m-d', $_POST["fechaFin"]);
        $h = new DateTime();
        $dif = $h->diff($fNac)->y;
        $valFechaNac="is-valid";
    }else{
        $valido=false;

    }

    $concurso->id=ISSET($_POST["Id"])?trim($_POST["Id"]):0;
    $concurso->nombre=ISSET($_POST["nombre"])?trim($_POST["nombre"]):"";
    $concurso->fechaInicio=ISSET($_POST["fechaInicio"])?DateTime::createFromFormat('Y-m-d', $_POST["fechaInicio"]):new DateTime();
    $concurso->fechaFin=ISSET($_POST["fechaFin"])?DateTime::createFromFormat('Y-m-d', $_POST["fechaFin"]):new DateTime();
    $concurso->estado ="No activado";
    if($valido){
        
        //Usar el método agregar del dao
        $dao= new DAOConcurso();

        if($concurso->id==0){   
          if($dao->agregar($concurso)==0){ 
          }else{
              //Al finalizar el guardado redireccionar a la lista
              header("Location: GestionUsuarios.php");
          }
      }else{
          if($dao->editar($concurso)){
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