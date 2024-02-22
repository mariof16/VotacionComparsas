<?php
//Controlador de niveles
require_once "modelo/modeloadministracioncomparsa.php";
class ControladorAdministracionComparsa {
    public $modelo;
    public $error;
    public $vista;
    function __construct(){
        $this->modelo= new Modeloadministracioncomparsa();
    }
    function listar(){
        $this->vista='vistaadministracioncomparsalistar';
        return $this->modelo->listar();
    }
    function crear(){
        $this->vista='vistaadministracioncomparsacrear';
        if(isset($_POST["crear"])){
            if(!empty($_POST["nombre"])&& !empty($_FILES['imagen']['name'])){
                try{
                    $nombre=$_POST["nombre"];
                    $imagen="comparsa-".$_POST["nombre"];
                    $provincia=$_POST["provincia"];
                    $this->modelo->crear($nombre,$imagen,$provincia);

                    $carpeta_destino = 'img/comparsas/';
                    $nombre_archivo = $imagen.".jpg";

                    if(file_exists($carpeta_destino.$nombre_archivo)){
                        unlink($carpeta_destino.$nombre_archivo);
                    }

                    $temporal_archivo = $_FILES['imagen']['tmp_name'];
                    if(!move_uploaded_file($temporal_archivo, $carpeta_destino.$nombre_archivo)){
                        $this->error="moveno";
                    }
                }
                catch(Exception $e){
                    if($e->getcode()=="1062")
                        $this->error="El nombre ".$nombre." ya está en uso";
                }
                if(!$this->error){
                    header ("Location: index.php?controlador=administracioncomparsa&metodo=listar");
                }
            }else{
                $this->error="Provincia es el único campo que puede estar vacío";
            }
        }
    }
    function borrar(){
        $this->vista='vistaadministracioncomparsaborrar';
        if(isset($_POST["si"])){
            $carpeta_destino = 'img/comparsas/';
            $nombre_archivo = $this->modelo->imagenborrar($_POST["id"]).".jpg";
            $this->modelo->borrar($_POST["id"]);
            if(file_exists($carpeta_destino.$nombre_archivo)){
                unlink($carpeta_destino.$nombre_archivo);
            }
            header ("Location: index.php?controlador=administracioncomparsa&metodo=listar");
        }
        if(isset($_POST["no"])){
            header ("Location: index.php?controlador=administracioncomparsa&metodo=listar");
        }
    }
}