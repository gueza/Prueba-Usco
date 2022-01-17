<?php
include_once("conexion.php");

class Salones{

    public $id;
    public $nombre;
    
    public function _contruct($id,$nombre){
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public static function consultar(){
        $listaSalones=[];
        $conexionBD=BD::crearInstancia();

        $sentencia = $conexionBD->prepare("SELECT * FROM salones");
        $sentencia->execute();
        $listaSalones = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $listaSalones;

    }

    public static function crear($nombre){
        $conexionBD=BD::crearInstancia();
        $salones= Salones::consultar();
        foreach ($salones as $salon){
            if($salon['nombre'] == $nombre){
                return false;
            }
        }

        $sql = $conexionBD->prepare("INSERT INTO salones(nombre) VALUES(?)");
        $sql -> execute(array($nombre));
        return $sql;
    }

    public static function borrar($id){
        $conexionBD=BD::crearInstancia();
        $sql = $conexionBD->prepare("DELETE FROM salones WHERE id='$id'");
        $sql -> execute(array($id));
    }

    public static function buscar($id){
        $conexionBD=BD::crearInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM salones WHERE id=?");
        $sql -> execute(array($id));
        $salones=$sql->fetch();

        return $salones;
    }

    public static function editar($id,$nombre){
        $conexionBD=BD::crearInstancia();
        $salones= Salones::consultar();
        foreach ($salones as $salon){
            if($salon['nombre'] == $nombre){
                return false;
            }
        }

        $sql = $conexionBD->prepare("UPDATE salones SET nombre=? WHERE id=?");
        $sql -> execute(array($nombre,$id));
        return $sql;
    }
}

?>