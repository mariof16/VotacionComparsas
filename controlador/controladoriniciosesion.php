<?php
//Controlador de niveles
require_once "modelo/modeloiniciosesion.php";
class CIniciosesion {
    public $modelo;
    private $error;
    public $vista;
    function __construct(){
        $this->modelo= new MIniciosesion();
    }
    function mostrar(){
        $this->vista='vistainiciosesion';
    }
    function consultarusuario(){
        $usuario=$_POST["usuario"];
        $contra=$_POST["contra"];
       
        $this->vista='vistainiciosesion';
        $tipo=$this->modelo->consultarusuario($usuario,$contra);
        if($tipo=="administrador")
        {
            header("Location: index.php?controlador=Administracion&metodo=mostrar");
        }else{
            header("Location: index.php?controlador=Juez&metodo=listar");
        }
    }
}