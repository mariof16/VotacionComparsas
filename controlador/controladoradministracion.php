<?php
//Controlador de niveles
require_once "controlador/controladoriniciosesion.php";
require_once "modelo/modeloadministracion.php";
class CAdministracion extends CIniciosesion{
    public $modelo;
    public $error;
    public $vista;
    function __construct(){
        $this->modelo= new MAdministracion();
        $this->verificarsesion('administrador');
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