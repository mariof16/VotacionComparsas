<?php
require_once "conexion/conexion.php";
class ModeloJuez{
    private $conexion;
    function __construct(){
        $claseconexion = new Conexion();
        $this->conexion= $claseconexion->conexion;
    }
    public function listar(){
        $query = 'SELECT nombre,idComparsa,provincia FROM Comparsa';
        $resultado = $this->conexion->query($query);
        return $resultado;
    }
    public function votar(){
        
    }
    public function datosvotacion($id){
        $query = "SELECT c.idComparsa AS id, c.nombre AS nombre
        FROM Comparsa c
        WHERE c.idComparsa = $id
        UNION
        SELECT cri.idCriterio AS id, cri.nombre AS nombre
        FROM Criterios cri";
        $resultado = $this->conexion->query($query);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }
}