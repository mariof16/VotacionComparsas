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
        $query = "SELECT c.idComparsa AS id, c.nombre AS nombre, 'comparsa' AS tipo
        FROM Comparsa c
        WHERE c.idComparsa = $id
        UNION
        SELECT cri.idCriterio AS id, cri.nombre AS nombre, 'criterio' AS tipo
        FROM Criterios cri
        UNION
        SELECT u.idUsuario AS id, u.nombre AS nombre, 'juez' AS tipo
        FROM Usuarios u
        WHERE u.tipo = 'juez'";
        $resultado = $this->conexion->query($query);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }
}