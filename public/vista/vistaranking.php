<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="estilos/usuario-style.css">
</head>
<body>
    <div id="titulo">
        <h1>Ranking Comparsas Carnavales</h1>
    </div>
    <div id="menu">
        <a href="index.php?controlador=publico&metodo=ranking">Ranking</a>
        <a href="index.php?controlador=publico&metodo=podio">Podio</a>
        <a href="index.php?controlador=publico&metodo=buscar">Buscar</a>
    </div>
    <a id="pdf" href="index.php?controlador=publico&metodo=pdf" target="__blank">Descargar pdf</a>
    <div class="ranking">
        <table>
            <tr class="header">
                <th>Posición</th>
                <th>Nombre</th>
                <th>Puntuación</th>
            </tr>
            <?php 
            // print("<pre>".print_r($datos,true)."</pre>");
                foreach($datos as $i =>$fila){
                    echo "<tr>";
                    echo    "<td>".($i+1)."</td>";
                    echo    "<td>".$fila["nombre"]."</td>";
                    echo    "<td>".$fila["puntuaciontotal"]."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>