<?php
require_once "conexion.php";
class MPublico{
    private $conexion;
    function __construct(){
        $claseconexion = new Conexion();
        $this->conexion= $claseconexion->conexion;
    }
    public function ranking(){
        $query = 
        'SELECT Comparsa.nombre AS nombre,
        ROUND(AVG(Criterios_Votacion.puntuacion),2) AS PuntuacionTotal
        FROM 
            Comparsa
        JOIN 
            Votacion ON Comparsa.idComparsa = Votacion.idComparsa
        JOIN 
            Criterios_Votacion ON Votacion.idVoto = Criterios_Votacion.idVoto
        GROUP BY 
            Comparsa.idComparsa, Comparsa.nombre
        ORDER BY 
            PuntuacionTotal DESC;';
        $resultado = $this->conexion->query($query);
        $resultado=$resultado->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }
}