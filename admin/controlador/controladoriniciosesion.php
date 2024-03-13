<?php
//Controlador de niveles
require_once "modelo/modeloiniciosesion.php";
class CIniciosesion{
    public $modelo;
    public $error;
    public $vista;
    function __construct(){
        $this->modelo= new MIniciosesion();
    }
    function mostrar(){
        $this->vista='vistainiciosesion';
        if(isset($_POST['iniciarsesion'])){
            $this->consultarusuario();
        }
    }
    function consultarusuario(){
        $usuario=$_POST["usuario"];
        $contra=$_POST["contra"];


        $this->vista='vistainiciosesion';
        $resultado=$this->modelo->consultarusuario($usuario,$contra);
        if(!empty($resultado)){

            session_start();
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['nombre']=$resultado["nombre"];
            $_SESSION['tipo']=$resultado['tipo'];
            $_SESSION['id']=$resultado['idUsuario'];

            if($resultado['tipo']=="administrador")
            {
                header("Location: index.php?controlador=administracion&metodo=mostrar");
            }else if($resultado['tipo']=="juez"){
                header("Location: index.php?controlador=juez&metodo=listar");
            }
        }else{
            $this->error="Combinación de correo y contraseña incorrecta";
        }
    }
    function verificarsesion($tipo){
        
        session_start();
        if(isset($_SESSION['tipo']))
        {
            if($_SESSION['tipo']!=$tipo){
                header("Location: index.php?controlador=iniciosesion&metodo=mostrar");
            }
        }else{
            header("Location: index.php?controlador=iniciosesion&metodo=mostrar");
        }
    }
}