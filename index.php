<?php
require "config/config.php";

if(isset($_GET["controlador"])){
    $nombrecontrolador=($_GET["controlador"]);
}else{
    $nombrecontrolador=CONTROLADOR;
}
if(isset($_GET["metodo"])){
    $metodo=($_GET["metodo"]);
}

require_once "controlador/controlador".$nombrecontrolador.".php";
$nombreaux= "C".$nombrecontrolador;
$controlador= new $nombreaux();
$datos=$controlador->$metodo();

require_once 'vista/'.$controlador->vista.'.php';