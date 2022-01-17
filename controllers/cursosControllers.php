<?php

include_once("models/cursos.php");

include_once("conexion.php");
BD::crearInstancia();

    class CursosController{

        public function inicio(){
            $cursos= Cursos::consultar();
            include_once("views/cursos/inicio.php");
        }

        public function crear(){
            
            if(isset($_POST['codigo']) && isset($_POST['asignatura'])){

                $codigo= trim(strtolower($_POST['codigo']));
                $asignatura = trim(strtolower($_POST['asignatura']));

                if(!empty($codigo) && !empty($codigo)){
                    $rta=Cursos::crear($codigo,$asignatura);
                    if(!$rta){
                        $rta= "El código ".strtoupper($codigo)." o la asignatura ".strtoupper($asignatura)." ya existe";
                    }else{
                        header("Location:./?controlador=cursos&accion=inicio");
                    }
                }
               
                $rta = "No puede dejar campos vacíos"; 
            }
            include_once("views/cursos/crear.php");
        }

        public function editar(){

            $id=$_GET['id'];
            $cursos = Cursos::buscar($id);

            if(isset($_POST['codigo']) && isset($_POST['asignatura']) && isset($_GET['id'])){

                $codigo= trim(strtolower($_POST['codigo']));
                $asignatura = trim(strtolower($_POST['asignatura']));

                if(!empty($codigo) && !empty($codigo)){
                    $rta=Cursos::editar($id,$codigo,$asignatura);
                    if(!$rta){
                        $rta= "El código ".strtoupper($codigo)." o la asignatura ".strtoupper($asignatura)." ya existe";
                    }else{
                        header("Location:./?controlador=cursos&accion=inicio");
                    }
                }
               
                $rta = "No puede dejar campos vacíos"; 
            }

            include_once("views/cursos/editar.php");
        }

        public function borrar(){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                Cursos::borrar($id);
            }
            header("Location:./?controlador=cursos&accion=inicio");
        }
    }

?>