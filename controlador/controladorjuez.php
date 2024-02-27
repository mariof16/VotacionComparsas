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
        return $datos=$this->modelo->datosvotacion($_GET["id"]);
    }
}