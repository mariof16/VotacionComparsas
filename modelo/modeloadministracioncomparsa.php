<?php
//Lo que seria el modelo
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
    public function crear($nombre,$imagen,$provincia){
        $query = "INSERT INTO Comparsa (nombre, foto, provincia) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('sss', $nombre, $imagen, $provincia);
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
    public function modificar($id,$nombre,$imagen,$provincia){
        $query = "UPDATE Comparsa SET nombre = ?, foto = ?, provincia = ? WHERE idComparsa = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('sssi', $nombre, $imagen, $provincia, $id);
        $stmt->execute();
        $stmt->close();
    }
    public function imagenborrar($id){
        $query = "SELECT foto FROM Comparsa where idComparsa=$id";
        $resultado = $this->conexion->query($query);
        $fila = $resultado->fetch_assoc();
        return $fila['foto'];
    }
}