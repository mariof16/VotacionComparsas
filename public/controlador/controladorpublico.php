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
}