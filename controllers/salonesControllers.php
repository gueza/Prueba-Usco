<?php

include_once("models/Salones.php");

BD::crearInstancia();

    class SalonesController{

        public function inicio(){
            $salones= Salones::consultar();
            include_once("views/salones/inicio.php");
        }

        public function crear(){
            if(isset($_POST['nombre'])){
                $nombre = trim(strtolower($_POST['nombre']));
                if(!empty($nombre)){
                    $rta=Salones::crear($nombre);
                    if(!$rta){
                        $rta= "El nombre ".strtoupper($nombre)." ya existe ";
                    }else{
                        header("Location:./?controlador=salones&accion=inicio");
                    }
                }
                $rta = "No puede dejar campos vacíos";
               
            }
            include_once("views/salones/crear.php");
        }

        public function editar(){
            $id=$_GET['id'];
            $salones=Salones::buscar($id);

            if(isset($_GET['id']) && isset($_POST['nombre'])){
                $nombre = trim(strtolower($_POST['nombre']));

                if(!empty($nombre)){
                    $rta=Salones::editar($id,$nombre);
                    if(!$rta){
                        $rta= "El nombre ".strtoupper($nombre)." ya existe ";
                    }else{
                        header("Location:./?controlador=salones&accion=inicio");
                    }
                }
                $rta = "No puede dejar campos vacíos";           
            }

            include_once("views/salones/editar.php");
        }

        public function borrar(){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                Salones::borrar($id);
            }
            header("Location:./?controlador=salones&accion=inicio");
        }
    }

?>