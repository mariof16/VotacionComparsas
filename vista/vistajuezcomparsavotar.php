<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="estilos/usuario-style.css">
</head>
<body>
    <h1>Votación de los Carnavales</h1>
    <a href="index.php?controlador=juez&metodo=listar" class="boton">Atras</a>
    <div class="container" id="divcomparsas">
        <h2>Comparsa</h2>
        <h2><?php echo $datos[0]["nombre"]; ?></h2>
        <div class="comparsas-list" id="votacioneslistar">
            <?php
            for ($i = 1; $i < count($datos); $i++) {
                echo $datos[$i]["nombre"]." ".$datos[$i]["id"] . "<br>";
            }
            ?>
        </div>
    </div>
</body>
</html>