<?php
require_once "conexion/conexion.php";
class ModeloAdministracion {
    private $conexion;
    function __construct(){
        $claseconexion = new Conexion();
        $this->conexion= $claseconexion->conexion;
    }
}