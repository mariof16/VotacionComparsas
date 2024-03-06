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
    <?php
       if(isset($controlador->error)){
            echo "<h1 class='error'>";
            echo $controlador->error;
            echo "</h1>";
        }
    ?>   
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="index.php?controlador=iniciosesion&metodo=mostrar" method="post">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contra" placeholder="Contraseña" required>
            <input type="submit" name="iniciarsesion" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>