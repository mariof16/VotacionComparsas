<?php
require_once "conexion.php";
class MIniciosesion {
    private $conexion;
    function __construct(){
        $claseconexion = new Conexion();
        $this->conexion= $claseconexion->conexion;
    }
    public function consultarusuario($usuario, $contra){
        $query = "SELECT * FROM Usuarios WHERE correo='$usuario' AND contrasenia='$contra'";
        $resultado = $this->conexion->query($query);
        
        $fila = $resultado->fetch_assoc();
        return $fila;
    }
}