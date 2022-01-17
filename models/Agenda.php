<?php
include_once("conexion.php");

class Agenda{

    public $id;
    public $id_curso;
    public $id_profesor;
    public $id_grupo;
    public $id_salon;
    public $fecha;
    
    public function _contruct($id,$id_curso,$id_profesor,$id_grupo,$id_salon,$fecha){
        $this->id = $id;
        $this->id_curso = $id_curso;
        $this->id_profesor = $id_profesor;
        $this->id_grupo = $id_grupo;
        $this->id_salon = $id_salon;
        $this->fecha = $fecha;
    }

    public static function consultar(){

        $conexionBD=BD::crearInstancia();
        $sentencia = $conexionBD->query("SELECT agendas.id, cursos.codigo, cursos.asignatura, 
            profesores.nombres, profesores.apellido, profesores.correo, profesores.profesion,
            grupos.grupo, salones.nombre, horaInicio, horaFin
            FROM agendas 
            INNER JOIN cursos ON agendas.id_curso = cursos.id 
            INNER JOIN profesores ON agendas.id_profesor = profesores.id 
            INNER JOIN grupos ON agendas.id_grupo = grupos.id 
            INNER JOIN salones ON agendas.id_salon = salones.id");

        $sentencia->execute();
        $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $listaProductos;
    }

    public static function buscador($salon){

        $conexionBD=BD::crearInstancia();
        $sentencia = $conexionBD->query("SELECT id FROM salones WHERE nombre like '$salon%'");
        $sentencia->execute();
        $busqueda=$sentencia->fetch();

        return $busqueda;

    }
    public static function buscador2($salon){

        $conexionBD=BD::crearInstancia();
        $sql = $conexionBD->query("SELECT agendas.id, cursos.codigo, cursos.asignatura, 
            profesores.nombres, profesores.apellido, profesores.correo, profesores.profesion,
            grupos.grupo, salones.nombre, horaInicio, horaFin
            FROM agendas 
            INNER JOIN cursos ON agendas.id_curso = cursos.id 
            INNER JOIN profesores ON agendas.id_profesor = profesores.id 
            INNER JOIN grupos ON agendas.id_grupo = grupos.id 
            INNER JOIN salones ON agendas.id_salon = salones.id
            WHERE id_salon like '$salon'");

        $sql->execute();
        $listaProductos = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $listaProductos;
    }

    public static function crear($id_curso,$id_profesor,$id_grupo,$id_salon,$inicial,$final){
        
        $conexionBD=BD::crearInstancia();
        $agendas = $conexionBD->query("SELECT * FROM agendas");

        foreach($agendas->fetchAll(PDO::FETCH_ASSOC) as $agenda){
            $fechaActual = strtotime(date('Y-m-d H:i:s'));
            $fechaDB = strtotime($agenda['horaInicio']);
            $Finicial =  strtotime($inicial);
            $Ffinal =  strtotime($final);
            if(($agenda['id_salon']==$id_salon) && (($Finicial>=$fechaDB && $Ffinal<=$fechaDB) || 
                ($Finicial<$fechaDB && $Ffinal>=$fechaDB) ||  $Finicial<$fechaActual || $Ffinal<$fechaActual))
            {
                return false;
            }  
        }
        $sql = $conexionBD->prepare("INSERT INTO agendas(id_curso,id_profesor,id_grupo,id_salon,horaInicio,horaFin)
        VALUES(?,?,?,?,?,?)");
        $sql->execute(array($id_curso,$id_profesor,$id_grupo,$id_salon,$inicial,$final));
        return $sql;
    }

    public static function borrar($id){
        $conexionBD=BD::crearInstancia();
        $sql = $conexionBD->prepare("DELETE FROM agendas WHERE id=?");
        $sql -> execute(array($id));
    }

    public static function buscar($id){
        $conexionBD=BD::crearInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM agendas WHERE id=?");
        $sql->execute(array($id));
        $agenda=$sql->fetch();
        return $agenda;
    }

    public static function editar($id,$id_curso,$id_profesor,$id_grupo,$id_salon,$inicial,$final){
        $conexionBD=BD::crearInstancia();

        $sql = $conexionBD->prepare("UPDATE agendas SET id_curso=?,id_profesor=?,id_grupo=?,id_salon=?,
                horaInicio=?,horaFin=? WHERE id=?");
        $sql -> execute(array($id_curso,$id_profesor,$id_grupo,$id_salon,$inicial,$final,$id));

        return $sql;
    }

    public static function consultarCursos($id=null){
        $listacursos=[];
        $conexionBD=BD::crearInstancia();
        
        if(!empty($id)){
            $sql = $conexionBD->query("SELECT * FROM cursos WHERE id=?");
            $sql->execute(array($id));
            $resp = $sql->fetch();
        }else{
            $sql = $conexionBD->query("SELECT * FROM cursos");
            $sql->execute();
            $resp = $sql->fetchAll();
        }

        return $resp;
    }

    public static function consultarProfesores($id=null){
        $listacursos=[];
        $conexionBD=BD::crearInstancia();

        if(!empty($id)){
            $sql = $conexionBD->query("SELECT * FROM profesores WHERE id=?");
            $sql->execute(array($id));
            $resp = $sql->fetch();
        }else{
            $sql = $conexionBD->query("SELECT * FROM profesores");
            $sql->execute();
            $resp = $sql->fetchAll();
        }
        return $resp;
    }
    public static function consultarGrupos($id=null){
        $listacursos=[];
        $conexionBD=BD::crearInstancia();

        if(!empty($id)){
            $sql = $conexionBD->query("SELECT * FROM grupos WHERE id=?");       
            $sql->execute(array($id));
            $resp = $sql->fetch();
        }else{
            $sql = $conexionBD->query("SELECT * FROM grupos");       
            $sql->execute();
            $resp = $sql->fetchAll();
        }

        return $resp;
    }
    public static function consultarSalones($id=null){
        $listacursos=[];
        $conexionBD=BD::crearInstancia();

        if(!empty($id)){
            $sql = $conexionBD->query("SELECT * FROM salones WHERE id=?");
            $sql->execute(array($id));
            $resp = $sql->fetch();
        }else{
            $sql = $conexionBD->query("SELECT * FROM salones");
            $sql->execute();
            $resp = $sql->fetchAll();
        }

        return $resp;
    }
}

?>