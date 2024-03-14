<?php
//Controlador de niveles
require_once "modelo/modelopublico.php";
class CPublico{
    public $modelo;
    public $vista;
    function __construct(){
        $this->modelo= new MPublico();
    }
    function ranking(){
        $this->vista='vistaranking';
        return $this->modelo->ranking();
    }
    function podio(){
        $this->vista='vistaranking';
        return $this->modelo->podio();
    }
    function buscar(){
        $this->vista='vistabuscar';
        $resultado = false;
        if(isset($_POST["buscar"])){
            $resultado=$this->modelo->buscar($_POST["nombrecomparsa"]);
        }
        return $resultado;
    }
}