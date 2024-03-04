<?php
//Controlador de niveles
require_once "modelo/modeloadministracioncomparsa.php";
class CAdministracionComparsa {
    public $modelo;
    public $error;
    public $vista;
    function __construct(){
        $this->modelo= new MAdministracionComparsa();
    }
    function listar(){
        $this->vista='vistaadministracioncomparsalistar';
        return $this->modelo->listar();
    }
    function crear(){
        $this->vista='vistaadministracioncomparsacrear';
        if(isset($_POST["crear"])){
            if(!empty($_FILES['imagen']['tmp_name'])){
                $tipoarchivo = exif_imagetype($_FILES['imagen']['tmp_name']);

                if ($tipoarchivo === IMAGETYPE_JPEG || $tipoarchivo === IMAGETYPE_PNG || $tipoarchivo === IMAGETYPE_GIF) {
                   $imagen=true;
                } else {
                    $this->error='El archivo no es una imagen válida.';
                }
            }
            if($imagen){
                try{
                    $nombre=$_POST["nombre"];
                    $poblacion=$_POST["poblacion"];
                    $this->modelo->crear($nombre,$imagen,$poblacion);

                    $carpeta_destino = 'img/comparsas/';
                    $nombre_archivo = "comparsa-".$nombre.".jpg";

                    if(file_exists($carpeta_destino.$nombre_archivo)){
                        unlink($carpeta_destino.$nombre_archivo);
                    }

                    $temporal_archivo = $_FILES['imagen']['tmp_name'];
                    if(!move_uploaded_file($temporal_archivo, $carpeta_destino.$nombre_archivo)){
                        $this->error="Error al subir archivo";
                    }
                }
                catch(Exception $e){
                    if($e->getcode()=="1062")
                        $this->error="El nombre ".$nombre." ya está en uso";
                }
            }else{
                $this->error="poblacion es el único campo que puede estar vacío";
            }
            if(!$this->error){
                header ("Location: index.php?controlador=administracioncomparsa&metodo=listar");
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
    function modificar(){
        $this->vista='vistaadministracioncomparsamodificar';
        if(isset($_POST["modificar"])){
            if(!empty($_POST["nombre"])){
                try{
                    $imagenanterior="comparsa-".$this->modelo->datosformulario($_GET["id"])["nombre"];
                    $nombre=$_POST["nombre"];
                    $imagen="comparsa-".$_POST["nombre"];
                    $poblacion=$_POST["poblacion"];

                    $this->modelo->modificar($_GET["id"],$_POST["nombre"],$_POST["poblacion"]);

                    $carpeta_destino = 'img/comparsas/';
                    $nombre_archivo = $imagen.".jpg";
                    
                    if($imagen!=$imagenanterior && empty($_FILES['imagen']['tmp_name'])){
                       rename($carpeta_destino.$imagenanterior.".jpg",$carpeta_destino.$nombre_archivo);
                    }
                    if(!empty($_FILES['imagen']['tmp_name'])){
                        unlink($carpeta_destino.$imagenanterior.".jpg");
                        if(file_exists($carpeta_destino.$nombre_archivo)){
                            unlink($carpeta_destino.$nombre_archivo);
                        }
                        $temporal_archivo = $_FILES['imagen']['tmp_name'];
                        if(!move_uploaded_file($temporal_archivo, $carpeta_destino.$nombre_archivo)){
                            $this->error="Error al subir archivo";
                        }
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
                $this->error="Poblacion es el único campo que puede estar vacío";
            }
        }
        return $this->modelo->datosformulario($_GET["id"]);
    }
}