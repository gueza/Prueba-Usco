<?php
include_once("conexion.php");

class Cursos{

    public $id;
    public $codigo;
    public $asignatura;
    
    public function _contruct($id,$codigo,$asignatura){
        $this->id = $id;
        $this->codigo = $codigo;
        $this->asignatura = $asignatura;
    }

    public static function consultar(){

        $conexionBD=BD::crearInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cursos");
        $sql->execute();
        $listacursos = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $listacursos;
    }

    public static function crear($codigo,$asignatura){
        $conexionBD=BD::crearInstancia();
        $cursos= Cursos::consultar();
        foreach ($cursos as $curso){
            if($curso['codigo'] == $codigo || $curso['asignatura'] == $asignatura){
                return false;
            }
        }

        $sql = $conexionBD->prepare("INSERT INTO cursos(codigo,asignatura) VALUES(?,?)");
        $sql->execute(array($codigo,$asignatura));
        return $sql;
        
    }

    public static function borrar($id){
        $conexionBD=BD::crearInstancia();
        $sql = $conexionBD->prepare("DELETE FROM cursos WHERE id=?");
        $sql->execute(array($id));
    }

    public static function buscar($id){
        $conexionBD=BD::crearInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cursos WHERE id=?");
        $sql->execute(array($id));
        $cursos=$sql->fetch();

        return  $cursos;
    }

    public static function editar($id,$codigo,$asignatura){
        $conexionBD=BD::crearInstancia();
        $cursos= Cursos::consultar();
        foreach ($cursos as $curso){
            if($curso['codigo'] == $codigo || $curso['asignatura'] == $asignatura){
                return false;
            }
        }

        $sql = $conexionBD->prepare("UPDATE cursos SET codigo=?,asignatura=? WHERE id=?");
        $sql->execute(array($codigo,$asignatura,$id));
        return $sql;
    }
}

?>