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
        <form action="index.php?controlador=administracioncomparsa&metodo=crear" method="post" enctype="multipart/form-data">
            <p>Nombre</p>
            <input type="text" name="nombre">
            <p>Imagen</p>
            <input type="file" name="imagen">
            <p>Poblacion (opcional)</p>
            <input type="text" name="poblacion">
            <br>
            <input type="submit" name="crear">
        </form>
    </div>
</body>
</html>