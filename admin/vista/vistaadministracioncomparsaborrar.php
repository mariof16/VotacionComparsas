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
        <h2>Borrar comparsa: <?php if(isset($_GET["nombre"])) echo $_GET["nombre"]?></h2>
        <?php 
            if($datos)
                echo "Hay votaciones para esta comparsa, se borrarian también";
        ?>
        <form action="index.php?controlador=administracioncomparsa&metodo=borrar" method="post" enctype="multipart/form-data" class="borrado">   
            <div>
                <input type="submit" name="si" value="Si">
                <input type="submit" name="no" value="No">
            </div>
            <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
            <input type="hidden" name="nombreimagen" value="<?php echo $_GET["nombre"]?>">
        </form>
    </div>
</body>
</html>