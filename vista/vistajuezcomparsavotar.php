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
    <a href="index.php?controlador=juez&metodo=listar" class="boton">Atras</a>
    <div class="container" id="divcomparsas">
        <h2>Comparsa</h2>
        <h2><?php echo $datos[0]["nombre"]; ?></h2>
        <form class="divvotar">
            <div>
                <img src="img/comparsas/comparsa-<?php if(isset($datos[0]["nombre"])) echo $datos[0]["nombre"].".jpg"?>">
            </div>
            <div>
            <?php
                for ($i = 1; $i < count($datos); $i++) {
                    if($datos[$i]["tipo"]=="criterio"){
                        echo "<div>";
                        echo "<p>".$datos[$i]["nombre"]."</p>";
                        echo "<input type='number' value=0 name=".$datos[$i]["id"]."></input>";
                        echo "</div>";
                    }
                }
                echo "<select>";
                for ($i = 1; $i < count($datos); $i++) {
                    if($datos[$i]["tipo"]=="juez"){
                        echo "<option>".$datos[$i]["nombre"]."</option>";
                    }
                }
                echo "</select>";
                ?>
            </div>
        </form>
    </div>
</body>
</html>