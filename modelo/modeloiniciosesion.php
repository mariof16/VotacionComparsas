<?php
//Lo que seria el modelo
require_once "conexion/conexion.php";
class ModeloIniciosesion {
    private $conexion;
    function __construct(){
        $claseconexion = new Conexion();
        $this->conexion= $claseconexion->conexion;
    }
    public function consultarusuario($usuario, $contra){
        $query = "SELECT tipo FROM Usuarios WHERE correo='$usuario' AND contrasenia='$contra'";
        $resultado = $this->conexion->query($query);
        
        $fila = $resultado->fetch_assoc();
        return $fila['tipo'];
    }
}