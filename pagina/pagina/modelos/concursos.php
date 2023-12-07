<?php
    class Concurso {
        public $id=0;
        public $nombre="";
        public $fechaInicio;
        public $fechaFin; 
        public $estado="";

        public function __construct(){
            $this->fechaInicio=new DateTime();
            $this->fechaFin=new DateTime();
        }
      
    }
    
?>