<?php
//Controlador de niveles
require_once "modelo/modelojuez.php";
class ControladorJuez {
    public $modelo;
    public $error;
    public $vista;
    function __construct(){
        $this->modelo= new Modelojuez();
    }
    function listar(){
        $this->vista='vistajuezcomparsalistar';
        return $this->modelo->listar();
    }
    function votar(){
        $this->vista='vistajuezcomparsavotar';
        $validacion=true;
        if(isset($_POST["votar"])){
            /*foreach ($_POST["criterios"] as $idCriterio => $criterio) {
                foreach ($criterio as $id => $puntuacion) {
                    if($puntuacion>-1 && $puntuacion<11){
                        $validacion=false;
                        echo $puntuacion;
                    }
                }
            }*/
            if($validacion){
                try{
                    $this->modelo->votar($_POST["idjuez"],$_POST["idcomparsa"],$_POST["criterios"]);
                }
                catch(Exception $e)
                {
                    if($e->getCode()==1062)
                        $this->error="Ya has votado a esa comparsa";
                    return $datos=$this->modelo->datosvotacion($_POST["idcomparsa"]);
                }
                if(!$this->error){
                    header ("Location: index.php?controlador=juez&metodo=listar");
                }
            }else{
                $this->error="La nota de los criterios tiene que estar entre 0 y 10";
                return $datos=$this->modelo->datosvotacion($_POST["idcomparsa"]);
            }
        }
        else{
            return $datos=$this->modelo->datosvotacion($_GET["id"]);
        }
    }
}