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
        <?php
            if(isset($controlador->error)){
                echo "<h1 class='error'>";
                echo $controlador->error;
                echo "</h1>";
            }
        ?>    
        <h2>Comparsa</h2>
        <h2><?php echo $datos[0]["nombre"]; ?></h2>
        <form class="divvotar" action="index.php?controlador=juez&metodo=votar" method="post">
            <div>
                <img src="img/comparsas/comparsa-<?php if(isset($datos[0]["nombre"])) echo $datos[0]["nombre"].".jpg"?>">
            </div>
            <div>
            <?php
                echo "<input type=hidden name=idcomparsa value=".$datos[0]["id"].">";
                for ($i = 1; $i < count($datos); $i++) {
                    if($datos[$i]["tipo"]=="criterio"){
                        echo "<div>";
                        echo "<p>".$datos[$i]["nombre"]."</p>";
                        echo "<input type='number' value=0 name=criterios[$i][".$datos[$i]["id"]."]></input>";
                        echo "</div>";
                    }
                }
                echo "<select name='idjuez'>";
                for ($i = 1; $i < count($datos); $i++) {
                    if($datos[$i]["tipo"]=="juez"){
                        echo "<option value=".$datos[$i]["id"].">".$datos[$i]["nombre"]."</option>";
                    }
                }
                echo "</select>";
                echo "<input type='submit' value='votar' name='votar'></input>";
                ?>
            </div>
        </form>
    </div>
</body>
</html>