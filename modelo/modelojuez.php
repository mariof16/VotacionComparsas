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
    public function votar($idjuez, $idcomparsa, $criterios,$fechahora) {
        $query = "INSERT INTO Votacion (idJuez, idComparsa,fechahora) VALUES ($idjuez, $idcomparsa,'$fechahora')";
        $this->conexion->query($query);
        $idVoto = $this->conexion->insert_id;
        foreach ($criterios as $idCriterio => $criterio) {
            foreach ($criterio as $id => $puntuacion) {
                $query = "INSERT INTO Criterios_Votacion (idVoto, idCriterio, puntuacion) VALUES ($idVoto, $idCriterio, $puntuacion)";
                $this->conexion->query($query);
            }
        }
    }
    public function modificar($idjuez, $idcomparsa, $criterios,$fechahora) {
        $query = "UPDATE Votacion SET fechahora='$fechahora' WHERE idJuez=$idjuez and idComparsa=$idcomparsa";
        $this->conexion->query($query);
        $idVoto = 
        foreach ($criterios as $idCriterio => $criterio) {
            foreach ($criterio as $id => $puntuacion) {
                $query = "UPDATE Criterios_Votacion SET puntuacion=$puntuacion WHERE idVoto=$idVoto and idCriterio=$idCriterio";
                $this->conexion->query($query);
            }
        }
    }
    public function datosparavotacion($id) {
        $query = "(SELECT c.idComparsa AS id, c.nombre AS nombre, 'comparsa' AS tipo
        FROM Comparsa c
        WHERE c.idComparsa = $id)
        UNION
        (SELECT cri.idCriterio AS id, cri.nombre AS nombre, 'criterio' AS tipo
        FROM Criterios cri)
        ORDER BY tipo, id";
        
        $resultado = $this->conexion->query($query);
        $datos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $datos;
    }
    public function datosvotacion($idjuez,$idcomparsa,$idcriterio){
        $query = "SELECT puntuacion
        FROM Criterios_Votacion cv
        JOIN Votacion v ON cv.idVoto = v.idVoto
        WHERE v.idJuez = $idjuez
        AND v.idComparsa = $idcomparsa
        AND cv.idCriterio = $idcriterio";

        $resultado = $this->conexion->query($query);
        $datos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $datos;
    }
    public function yavotado($idjuez,$idcomparsa){
        $query ="SELECT * FROM Votacion Where idJuez= $idjuez and idComparsa=$idcomparsa";
        $resultado= $this->conexion->query($query);
        $filas = $resultado->num_rows;
        return $filas > 0;
    }
}