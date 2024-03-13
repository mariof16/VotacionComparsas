<?php
require_once "config/config_db.php";
class Conexion{
    public $conexion;
    public function __construct(){
        $this->conexion= new mysqli(HOST,USER,PASSWORD,DATABASE);
    }
}