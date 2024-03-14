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
        <a href="index.php?controlador=Publico&metodo=ranking">Ranking</a>
        <a href="index.php?controlador=Publico&metodo=podio">Podio</a>
        <a href="index.php?controlador=Publico&metodo=buscar">Buscar</a>
    </div>
    <?php
    if(!empty($datos)){
        echo"<div class='ranking'>
            <table>
                <tr class='header'>
                    <th>Posición</th>
                    <th>Nombre</th>
                    <th>Puntuación</th>
                </tr>";
                foreach($datos as $i =>$fila){
                    echo "<tr>";
                    echo    "<td>".($i+1)."</td>";
                    echo    "<td>".$fila["nombre"]."</td>";
                    echo    "<td>".$fila["PuntuacionTotal"]."</td>";
                    echo "</tr>";
                }
                echo"
            </table>
        </div>";
    }else{
        echo "<form id='formulariobuscar' action='index.php?controlador=Publico&metodo=buscar' method='post'>";
        echo "<label for='nombrecomparsa'>Nombre de la comparsa a buscar:</label>";
        echo "<input type='text' name='nombrecomparsa'></input>";
        echo "<input type='submit' name='buscar'></input>";
        echo"</form>";
    }
    ?>
</body>
</html>