<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="estilos/admin-style.css">
</head>
<body>
    <h1>Votación de los Carnavales</h1>
    <div class="container" id="divcomparsas">
        <h2>Comparsas</h2>
        <a id="aniadir" href="index.php?controlador=administracioncomparsa&metodo=crear">Añadir comparsa</a>
        <div class="comparsas-list">
            <?php
            foreach($datos as $fila){
                echo "<div class='comparsa'>";
                echo "  <h3>".$fila["nombre"]."</h3>";
                echo "  <p>".$fila["provincia"]."</p>";
                echo "  <div>";
                echo "      <a><img src='img/modificar.png'></img></a>";
                echo "      <a href='index.php?controlador=administracioncomparsa&metodo=borrar&id=".$fila["idComparsa"]."&nombre=".$fila["nombre"]."'><img src='img/borrar1.png'></img></a>";
                echo "  </div>";
                echo "</div>";
            }?>
        </div>
    </div>
</body>
</html>