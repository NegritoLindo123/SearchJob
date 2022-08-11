<?php 
    require_once "login-register/conexion.php";
    require_once "helpers.php";
    // if(!isset($_POST['nombre'])){
    //     header("Location: index.php");
    // }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/icons/style.css">
    <title>Document</title>
    <style>

        .container {
            height: 100vh;
            width: 100%;

            display: flex;
            flex-direction: row;
        }

        .busqueda {
            width: 30%;

            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .busqueda form{
            margin: 30px 10px;
            width: 80%;
        }
        .busqueda form input[type="text"]{
            border: 1px solid #434343;
            border-radius: 10px;
            font-size: 20px;
            padding: 10px 17px;
            width: 100%;
        }

        .busqueda .iconos {
            width: 80%;

            display: flex;
            align-items: center;
            flex-direction: row;
            justify-content: space-around;
            text-align: center;
        }

        .busqueda .iconos span {
            background: rgba(105, 183, 185, 1);
            border-radius: 10px;
            color: #fff;
            font-size: 25px;
            padding: 15px;
        }

        .empleos {
            width: 70%;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="busqueda">
            <form action="">
                <input type="text" name="busqueda" id="" placeholder="Buscar empleo">
            </form>
            <div class="iconos">
                <span class="icon-facebook"></span>
                <span class="icon-instagram"></span>
                <span class="icon-twitter"></span>
                <span class="icon-whatsapp"></span>
            </div>
        </div>
        <div class="empleos">
            <?php 
                $empleos = conseguirEmpleo($conexion, $_POST['nombre'], $_POST['id']);
                if(!empty($empleos) && mysqli_num_rows($empleos) >= 1):
                    while($empleo = mysqli_fetch_assoc($empleos)):
            ?>
                <div class="details-empleo">
                    <div class="img">
                        <img src="" alt="logo.empresa">
                    </div>
                    <div class="nombre-empleo">
                        <h2><?=$empleo['nombre']?></h2>
                        <ul>
                            <li><?=$empleo['direccion']?></li>
                            <li><?=$empleo['empresa']?></li>
                            <li><?=$empleo['jornada']?></li>
                            <li><?=$empleo['salario']?></li>
                        </ul>
                    </div>
                    <div class="ir-empleo">
                        <a href="empleo.php?id=<?=$empleo['codigo']?>">Ver empleo</a>
                        <p>Publicado hace 3 días</p>
                    </div>
                </div>
            <?php
                    endwhile;
                endif;
            ?> 
        </div>
    </div>

    <!-- <h1>Resultado de la busqueda: <?=$_POST['nombre'] ?></h1> 
        <article>
            <h3><?//=//$empleo['nombre'] ?></h3>
            <b><?//=//$empleo['salario'] ?></b>
            <p><?//=//$empleo['descripcion'] ?></p>
            
        </article>    -->
</body>
</html>