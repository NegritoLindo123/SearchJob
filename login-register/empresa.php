<?php 

    require_once "conexion.php";
    if(!isset($_SESSION['usuario'])){
        header('Location: login.php');
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Empresa</title>
</head>
<body>
    
    <h1>Hola <?=$_SESSION['usuario']['nombre']; ?></h1>
    <a href="logout.php">Cerrar Sesion</a>

</body>
</html>