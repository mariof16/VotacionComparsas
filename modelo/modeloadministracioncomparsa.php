<?php
require_once "conexion/conexion.php";
class ModeloAdministracionComparsa {
    private $conexion;
    function __construct(){
        $claseconexion = new Conexion();
        $this->conexion= $claseconexion->conexion;
    }
    public function listar(){
        $query = 'SELECT * FROM Comparsa';
        $resultado = $this->conexion->query($query);
        return $resultado;
    }
    public function crear($nombre,$provincia){
        $query = "INSERT INTO Comparsa (nombre, provincia) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('ss', $nombre, $provincia);
        $stmt->execute();
        $stmt->close();
    }
    public function borrar($id){
        $query = "DELETE FROM Comparsa WHERE idComparsa=$id";
        $this->conexion->query($query);
    }
    public function datosformulario($id){
        $query = "SELECT * FROM Comparsa WHERE idComparsa=$id";
        $resultado = $this->conexion->query($query);
        $datos = $resultado->fetch_assoc();
        return $datos;
    }
    public function modificar($id,$nombre,$provincia){
        $query = "UPDATE Comparsa SET nombre = ?, provincia = ? WHERE idComparsa = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('ssi', $nombre, $provincia, $id);
        $stmt->execute();
        $stmt->close();
    }
    public function imagenborrar($id){
        $query = "SELECT nombre FROM Comparsa where idComparsa=$id";
        $resultado = $this->conexion->query($query);
        $fila = $resultado->fetch_assoc();
        return "comparsa-".$fila['nombre'];
    }
}