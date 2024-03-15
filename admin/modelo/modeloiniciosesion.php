<?php
require_once "conexion.php";
class MIniciosesion {
    private $conexion;
    function __construct(){
        $claseconexion = new Conexion();
        $this->conexion= $claseconexion->conexion;
    }
    public function consultarusuario($usuario, $contra){
        $query = "SELECT * FROM Usuarios WHERE correo=?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows == 1) {
            $fila = $resultado->fetch_assoc();
            if (password_verify($contra, $fila['contrasenia'])) {
                return $fila;
            }
        }
        return null;
    }
    
}