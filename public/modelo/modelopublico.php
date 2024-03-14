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
        ROUND(AVG(Criterios_Votacion.puntuacion),2) AS puntuaciontotal
        FROM 
            Comparsa
        JOIN 
            Votacion ON Comparsa.idComparsa = Votacion.idComparsa
        JOIN 
            Criterios_Votacion ON Votacion.idVoto = Criterios_Votacion.idVoto
        GROUP BY 
            Comparsa.idComparsa, Comparsa.nombre
        ORDER BY 
            puntuaciontotal DESC;';
        $resultado = $this->conexion->query($query);
        $resultado=$resultado->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }
    public function podio(){
        $query = 
        'SELECT Comparsa.nombre AS nombre,
        ROUND(AVG(Criterios_Votacion.puntuacion),2) AS puntuaciontotal
        FROM 
            Comparsa
        JOIN 
            Votacion ON Comparsa.idComparsa = Votacion.idComparsa
        JOIN 
            Criterios_Votacion ON Votacion.idVoto = Criterios_Votacion.idVoto
        GROUP BY 
            Comparsa.idComparsa, Comparsa.nombre
        ORDER BY 
            puntuaciontotal DESC
        LIMIT 3;'; // Limitar a solo los tres primeros resultados
        $resultado = $this->conexion->query($query);
        $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }
    public function buscar($nombrecomparsa){
        $query = 
        "SELECT Comparsa.nombre AS nombre,
        ROUND(AVG(Criterios_Votacion.puntuacion), 2) AS puntuaciontotal
        FROM 
            Comparsa
        JOIN 
            Votacion ON Comparsa.idComparsa = Votacion.idComparsa
        JOIN 
            Criterios_Votacion ON Votacion.idVoto = Criterios_Votacion.idVoto
        WHERE 
            Comparsa.nombre LIKE '%$nombrecomparsa%'
        GROUP BY 
            Comparsa.idComparsa, Comparsa.nombre
        ORDER BY 
            PuntuacionTotal DESC
        LIMIT 3;"; // Limitar a solo los tres primeros resultados

        $resultado = $this->conexion->query($query);
        $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }
}