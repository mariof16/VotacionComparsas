<?php
require_once "conexion.php";
class MJuez{
    private $conexion;
    function __construct(){
        $claseconexion = new Conexion();
        $this->conexion= $claseconexion->conexion;
    }
    public function listar(){
        $query = 'SELECT nombre,idComparsa,poblacion FROM Comparsa';
        $resultado = $this->conexion->query($query);
        return $resultado;
    }
    public function votar($idjuez, $idcomparsa, $criterios) {
        $query = "INSERT INTO Votacion (idJuez, idComparsa) VALUES ($idjuez, $idcomparsa)";
        $this->conexion->query($query);
        $idVoto = $this->conexion->insert_id;
        foreach ($criterios as $idCriterio => $criterio) {
            foreach ($criterio as $id => $puntuacion) {
                $query = "INSERT INTO Criterios_Votacion (idVoto, idCriterio, puntuacion) VALUES ($idVoto, $idCriterio, $puntuacion)";
                $this->conexion->query($query);
            }
        }
    }
    public function datosvotacion($id) {
        $query = "SELECT c.idComparsa AS id, c.nombre AS nombre, 'comparsa' AS tipo
        FROM Comparsa c
        WHERE c.idComparsa = $id
        UNION
        SELECT cri.idCriterio AS id, cri.nombre AS nombre, 'criterio' AS tipo
        FROM Criterios cri";
    
        $resultado = $this->conexion->query($query);
        $datos = $resultado->fetch_all(MYSQLI_ASSOC);
        $resultado->close();

        return $datos;
    }
    public function yavotado($idjuez,$idcomparsa){
        $query ="SELECT * FROM Votacion Where idJuez= $idjuez and idComparsa=$idcomparsa";
        $resultado= $this->conexion->query($query);
        $filas = $resultado->num_rows;
        return $filas > 0;
    }
}