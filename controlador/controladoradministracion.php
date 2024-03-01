<?php
//Controlador de niveles
require_once "modelo/modeloadministracion.php";
class CAdministracion {
    public $modelo;
    private $error;
    public $vista;
    function __construct(){
        $this->modelo= new MAdministracion();
    }
    function mostrar(){
        $this->vista='vistaadministracion';
    }
    function consultarusuario(){
        $usuario=$_POST["usuario"];
        $contra=$_POST["contra"];
       
        $this->vista='vistainiciosesion';
        $tipo=$this->modelo->consultarusuario($usuario,$contra);
        echo $tipo;
    }
}