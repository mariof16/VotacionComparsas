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
    <a href="index.php" class="boton">Atras</a>
    <div class="container" id="divcomparsas">
        <h2>Comparsas</h2>
        <div class="comparsas-list" id="votacioneslistar">
            <?php
            //print("<pre>".print_r($datos,true)."</pre>");
            foreach($datos as $fila){
                if(isset($fila["nombre"])){
                    echo "<div class='comparsa'>";
                    echo "<h3>".$fila["nombre"]."</h3>";
                    echo "<h2>".$fila["poblacion"]."</h2>";
                    if(isset($fila["criterios"])){
                        foreach($fila["criterios"] as $criterio){
                            echo "<p>".$criterio[1].": ".$criterio[0]."</p>";
                        }
                    }
                    echo "  <div>";
                    if(!$fila['votado']){
                        echo "<p>Votar: </p>";
                        echo "<a class=botonvotar href='index.php?controlador=juez&metodo=votar&id=".$fila["idComparsa"]."'><img src='img/votar.png'></img></a>";
                    }else{
                        //Codigo para insertar las notas
                        echo "<p>Cambiar votación:</p>";
                        echo "<a class=botonvotar href='index.php?controlador=juez&metodo=modificar&id=".$fila["idComparsa"]."'><img src='img/votar.png'></img></a>";
                    }
                    echo "  </div>";
                    echo "</div>";
                }
            }?>
        </div>
    </div>
</body>
</html>