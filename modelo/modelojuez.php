<?php
//Lo que seria el modelo
require_once "conexion/conexion.php";
class ModeloJuez {
    private $conexion;
    function __construct(){
        $claseconexion = new Conexion();
        $this->conexion= $claseconexion->conexion;
    }
    public function listar(){
        $query = 'SELECT nombre,idComparsa,foto FROM Comparsa';
        $resultado = $this->conexion->query($query);
        return $resultado;
    }
}