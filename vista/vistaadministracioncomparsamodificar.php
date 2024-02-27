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
    <a href="index.php?controlador=administracioncomparsa&metodo=listar" class="boton">Atras</a>
    <div class="container" id="divcomparsas">
        <?php
            if(isset($controlador->error)){
                echo "<h1 class='error'>";
                echo $controlador->error;
                echo "</h1>";
            }?>
        <h2>Comparsas</h2>
        <form action="index.php?controlador=administracioncomparsa&metodo=modificar&id=<?php echo $_GET["id"]?>" method="post" enctype="multipart/form-data">
            <p>Nombre</p>
            <input type="text" name="nombre" value="<?php if(isset($datos['nombre'])) echo $datos['nombre']?>">
            <p>Imagen</p>
            <img id="imgmodificar" src="img/comparsas/comparsa-<?php if (isset($datos['nombre'])) echo $datos['nombre']?>.jpg">
            <input type="file" name="imagen">
            <p>Provincia</p>
            <input type="text" name="provincia" value="<?php if(isset($datos['provincia'])) echo $datos['provincia']?>">
            <br>
            <input type="submit" name="modificar">
        </form>
    </div>
</body>
</html>