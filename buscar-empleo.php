<?php 
    require_once "login-register/conexion.php";
    require_once "helpers.php";
    if(!isset($_POST['nombre'])){
        header("Location: index.php");
    }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Resultado de la busqueda: <?=$_POST['nombre'] ?></h1>
    <?php 
        $empleos = conseguirempleo($conexion, $_POST['nombre'], $_POST['id']);
        if(!empty($empleos) && mysqli_num_rows($empleos) >= 1):
            while($empleo = mysqli_fetch_assoc($empleos)):
    ?> 
        <article>
            <h3><?=$empleo['nombre'] ?></h3>
            <b><?=$empleo['salario'] ?></b>
            <p><?=$empleo['descripcion'] ?></p>
            <a href="empleo.php?id=<?=$empleo['codigo']?>">Ver empleo</a>
        </article>
    <?php
            endwhile;
        endif;
    ?>    
</body>
</html>