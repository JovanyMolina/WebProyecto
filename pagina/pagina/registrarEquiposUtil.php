<?php
    require_once('datos/daoEquipos.php');
    $equipo= new equipos();


    $valNombreEquipo = $valEstudiante1 = $valEstudiante2 = $valEstudiante3 = "";

    if(count($_POST)==1 && ISSET($_POST["id"]) && is_numeric($_POST["id"])){

        //Obtener la info del usuario con ese id
        $dao=new DAOEquipo();
        $equipo=$dao->obtenerUno($_POST["id"]);


    }elseif (count($_POST) > 0) {
        $valNombreEquipo = $valEstudiante1 = $valEstudiante2 = $valEstudiante3 = "is-invalid";
        $valido = true;
        
        //validar Nombre equipo
        if (
            isset($_POST["nombreEquipo"]) && (strlen(trim($_POST["nombreEquipo"])) > 10 && strlen(trim($_POST["nombreEquipo"])) < 25) &&
            preg_match("/^[a-zA-Z.\s]+$/", $_POST["nombreEquipo"])
        ) {
            $valNombreEquipo = "is-valid";
            $equipoNombre = $_POST["nombreEquipo"];
        } else {
            $valido = false;
        }
        //Validar nombre del estudiante 1
        if (
            isset($_POST["EstudianteUno"]) && (strlen(trim($_POST["EstudianteUno"])) > 10 && strlen(trim($_POST["EstudianteUno"])) < 30) &&
            preg_match("/^[a-zA-Z.\s]+$/", $_POST["EstudianteUno"])
        ) {
            $valEstudiante1 = "is-valid";
            $estudiante1 = $_POST["EstudianteUno"];
        } else {
            $valido = false;
        }        
        //Validar nombre del estudiante 2
        if (
            isset($_POST["EstudianteDos"]) && (strlen(trim($_POST["EstudianteDos"])) > 10 && strlen(trim($_POST["EstudianteDos"])) < 30) &&
            preg_match("/^[a-zA-Z.\s]+$/", $_POST["EstudianteDos"])
        ) {
            $valEstudiante2 = "is-valid";
            $estudiante2 = $_POST["EstudianteDos"];
        } else {
            $valido = false;
        }        
        //Validar nombre del estudiante 3
        if (
            isset($_POST["EstudianteTres"]) && (strlen(trim($_POST["EstudianteTres"])) > 10 && strlen(trim($_POST["EstudianteTres"])) < 30) &&
            preg_match("/^[a-zA-Z.\s]+$/", $_POST["EstudianteTres"])
        ) {
            $valEstudiante3 = "is-valid";
            $estudiante3 = $_POST["EstudianteTres"];
        } else {
            $valido = false;
        }
        $equipo->id=ISSET($_POST["Id"])?trim($_POST["Id"]):0;
        $equipo->nombreEquipo =ISSET($_POST["nombreEquipo"])?trim($_POST["nombreEquipo"]):"";
        $equipo->estudiante1 =ISSET($_POST["EstudianteUno"])?trim($_POST["EstudianteUno"]):"";
        $equipo->estudiante2 =ISSET($_POST["EstudianteDos"])?trim($_POST["EstudianteDos"]):"";
        $equipo->estudiante3 =ISSET($_POST["EstudianteTres"])?trim($_POST["EstudianteTres"]):"";
        $equipo->NombreDelCoach =ISSET($_POST["coach"])?trim($_POST["coach"]):"";
        $equipo->Aprobado ="No aprobado";

        //var_dump($equipo);
        $dao= new DAOEquipo();

        //Detectar si los valores son
        if($valido){
            if($equipo->id==0){
                if($dao->agregar($equipo)==0){
                    $_SESSION["msj"]="danger-Error al intentar guardar";

                }else{
                    header("Location: PaginaCoach.php");
                }
            }else{
//        var_dump($dao->editar($equipo));

                if($dao->editar($equipo)){
                    header("Location: PaginaCoach.php");

                }else{
                    echo"error";    
                }
            }
        }
    }

?>