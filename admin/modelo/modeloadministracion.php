<?php
require_once "conexion.php";
class MAdministracion {
    private $conexion;
    function __construct(){
        $claseconexion = new Conexion();
        $this->conexion= $claseconexion->conexion;
    }
}