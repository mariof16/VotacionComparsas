<?php
//Controlador de niveles
require_once "controlador/controladoriniciosesion.php";
require_once "modelo/modelojuez.php";
class CJuez extends CIniciosesion{
    public $modelo;
    public $error;
    public $vista;
    function __construct(){
        $this->modelo= new MJuez();
        $this->verificarsesion('juez');
    }
    public function listar() {
        $this->vista = 'vistajuezcomparsalistar';
    
        $comparsas = $this->modelo->listar();

        $resultado = [];
        
        foreach($comparsas as $fila){
            $idComparsa = $fila['idComparsa'];
            $idJuez = $_SESSION['id'];

            $votado = $this->modelo->yavotado($idJuez,$idComparsa); 
            $fila['votado'] = $votado;
            if(!empty($votado)){
                $notascriterios=[];
                $listanotascriterios=$this->modelo->criterios();
                foreach($listanotascriterios as $filacriterio){
                    $filaaux=[];
                    $nota=$this->modelo->datosvotacion($idJuez,$idComparsa,$filacriterio["idCriterio"]);
                    array_push($filaaux,$nota[0]["puntuacion"]);
                    array_push($filaaux,$filacriterio["nombre"]);
                    array_push($notascriterios,$filaaux);
                }
                $fila['criterios']=$notascriterios;
            }
            array_push($resultado,$fila);
        }
        return $resultado;
    }
    function votar(){
        $this->vista='vistajuezcomparsavotar';
        $validacion=true;
        if(isset($_POST["votar"])){
            foreach ($_POST["criterios"] as $idCriterio => $criterio) {
                foreach ($criterio as $id => $puntuacion) {
                    if($puntuacion<0 || $puntuacion>10){
                        $validacion=false;
                    }
                }
            }
            if($validacion){
                try{
                    $fecha = date("Y-m-d H:i:s");
                    $this->modelo->votar($_POST["idjuez"],$_POST["idcomparsa"],$_POST["criterios"],$fecha);
                }
                catch(Exception $e)
                {
                    $this->error=$fecha;
                    if($e->getCode()==1062)
                        $this->error="Ya has votado a esa comparsa";
                    return $datos=$this->modelo->datosparavotacion($_POST["idcomparsa"]);
                }
                if(!$this->error){
                    header ("Location: index.php?controlador=juez&metodo=listar");
                }
            }else{
                $this->error="La nota de los criterios tiene que estar entre 0 y 10";
                return $datos=$this->modelo->datosparavotacion($_POST["idcomparsa"]);
            }
        }
        else{
            return $datos=$this->modelo->datosparavotacion($_GET["id"]);
        }
    }
    function modificar(){
        $this->vista='vistajuezcomparsamodificar';
        $validacion=true;
        if(isset($_POST["votar"])){
            foreach ($_POST["criterios"] as $idCriterio => $criterio) {
                foreach ($criterio as $id => $puntuacion) {
                    if($puntuacion<0 || $puntuacion>10){
                        $validacion=false;
                    }
                }
            }
            if($validacion){
                try{
                    $fecha = date("Y-m-d H:i:s");
                    $this->modelo->modificar($_POST["idjuez"],$_POST["idcomparsa"],$_POST["criterios"],$fecha);
                }
                catch(Exception $e)
                {
                    return $datos=$this->datosvotacioncriterios($_POST["idcomparsa"],$_SESSION['id']);
                }
                if(!$this->error){
                    header ("Location: index.php?controlador=juez&metodo=listar");
                }
            }else{
                $this->error="La nota de los criterios tiene que estar entre 0 y 10";
                return $datos=$this->datosvotacioncriterios($_POST["idcomparsa"],$_SESSION['id']);
            }
        }
        else{
            return $datos=$this->datosvotacioncriterios($_GET["id"],$_SESSION['id']);
        }
    }
    function datosvotacioncriterios($idcomparsa,$idjuez){
        $criterios=$this->modelo->datosparavotacion($idcomparsa);
        $resultado =[];
        //En proceso
        foreach($criterios as $fila){
            if($fila['tipo']=="criterio"){
                
                $fila['puntuacion']=$this->modelo->datosvotacion($idjuez,$idcomparsa,$fila["id"])[0]['puntuacion'];
               
                array_push($resultado,$fila);
            }else{
                array_push($resultado,$fila);
            }
        }
        return $resultado;
    }
}