<?php

include_once("models/Agenda.php");

include_once("conexion.php");
BD::crearInstancia();

    class AgendasController{

        public function inicio(){
            $agendas = Agenda::consultar();
            include_once("views/agendas/inicio.php");
        }
        
        public function buscador(){
            
            $agendas=[];
            if($_POST){
                $salon = $_POST['salon'];
                $rta1 = Agenda::buscador($salon);
                $agendas = Agenda::buscador2($rta1['id']);
                if(empty($agendas)){
                    $rta= "No hay agenda con ese salón";
                }
            }
            
            include_once("views/agendas/buscador.php");
        }

        public function crear(){
            $cursos = Agenda::consultarCursos();
            $profesores = Agenda::consultarProfesores();
            $grupos = Agenda::consultarGrupos();
            $salones = Agenda::consultarSalones();

            if(isset($_POST['curso']) && isset($_POST['profesor']) && isset($_POST['grupo']) 
                && isset($_POST['salon']) && isset($_POST['inicial'])&& isset($_POST['final'])){
               
                $id_curso= trim(intval($_POST['curso']));
                $id_profesor = trim(intval($_POST['profesor']));
                $id_grupo = trim(intval($_POST['grupo']));
                $id_salon = trim(intval($_POST['salon']));
                $inicial = trim($_POST['inicial']);
                $final = trim($_POST['final']);

                if(!empty($id_curso) && !empty($id_profesor) && !empty($id_grupo) && !empty($id_salon)
                && !empty($inicial) && !empty($final)){
                    $rta=Agenda::crear($id_curso,$id_profesor,$id_grupo,$id_salon,$inicial,$final);
                    if(!$rta){
                        $rta= "No disponible";
                    }else{
                        header("Location:./?controlador=agendas&accion=inicio");
                    }
                    
                }else{
                    $rta = "No puede dejar campos vacíos";
                }
                
            }
            include_once("views/agendas/crear.php");
        }

        public function editar(){

            $id=$_GET['id'];
            $cursos = Agenda::consultarCursos();
            $profesores = Agenda::consultarProfesores();
            $grupos = Agenda::consultarGrupos();
            $salones = Agenda::consultarSalones();;

            if(isset($_POST['curso']) && isset($_POST['profesor']) && isset($_POST['grupo']) 
                && isset($_POST['salon']) && isset($_POST['inicial'])&& isset($_POST['final'])){
               
                $id_curso= trim(intval($_POST['curso']));
                $id_profesor = trim(intval($_POST['profesor']));
                $id_grupo = trim(intval($_POST['grupo']));
                $id_salon = trim(intval($_POST['salon']));
                $inicial = trim($_POST['inicial']);
                $final = trim($_POST['final']);

                if(!empty($id_curso) && !empty($id_profesor) && !empty($id_grupo) && !empty($id_salon)
                && !empty($inicial) && !empty($final)){
                    $rta=Agenda::editar($id,$id_curso,$id_profesor,$id_grupo,$id_salon,$inicial,$final);
                    if(!$rta){
                        $rta= "No disponible";
                    }else{
                        header("Location:./?controlador=agendas&accion=inicio");
                    }
                    
                }else{
                    $rta = "No puede dejar campos vacíos";
                }               
            }
           
            include_once("views/agendas/editar.php");
        }

        public function borrar(){
            if(isset($_GET['id'])){
                
                $id=$_GET['id'];
                Agenda::borrar($id);
                header("Location:./?controlador=agendas&accion=inicio");
            }
        }
    }

?>