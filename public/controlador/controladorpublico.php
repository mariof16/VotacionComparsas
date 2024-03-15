<?php
//Controlador de niveles
require_once "modelo/modelopublico.php";
require_once "TCPDF/tcpdf.php";
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
    function pdf(){
        $this->vista='vistaranking';
        $datos=$this->modelo->ranking();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->AddPage();
        $filas="";
        foreach($datos as $i =>$fila){
            $filas.="<tr>";
            $filas.=    "<td>".($i+1)."</td>";
            $filas.=    "<td>".$fila["nombre"]."</td>";
            $filas.=    "<td>".$fila["puntuaciontotal"]."</td>";
            $filas.="</tr>";
        }
        $html='
        <h1 style="text-align:center; font-size:30px;">Listado de comparsas</h1>
        <table style="background-color:#c8c8c8; padding:15px;">
            <tbody>
            <tr>
                <th>Posición</th>
                <th>Nombre</th>
                <th>Puntuación</th>
            </tr>
            '.$filas.
            '
            </tbody>
        </table>';
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('listadocomparsas.pdf', 'I');
    }
    function podio(){
        $this->vista='vistapodio';
        return $this->modelo->podio();
    }
    function buscar() {
        $this->vista = 'vistabuscar';
        $resultado = false;
    
        if (isset($_POST["buscar"])) {
            $nombrecomparsa = $_POST["nombrecomparsa"];
            $resultado = $this->modelo->buscar($nombrecomparsa);

            setcookie("nombrecomparsa", $nombrecomparsa, time() + (86400 * 30), "/"); // 30 días de duración
        } else {
            if (isset($_COOKIE["nombrecomparsa"])) {
                $nombrecomparsa = $_COOKIE["nombrecomparsa"];
                $resultado = $this->modelo->buscar($nombrecomparsa);
            }
        }
    
        return $resultado;
    }
}