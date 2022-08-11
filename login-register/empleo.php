<?php 

    require_once "../helpers.php";
    require_once "conexion.php";
    // if(!isset($_SESSION['usuario'])){
    //     header('Location: login.php');
    // } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/icons/style.css">
    <title>Empleo</title>

    <style>

        .container{
            height: 100vh;
            width: 100%;

            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .container .seccion1{
            width: 50%;

            display: flex;
            flex-direction: column;
        }

        .container .seccion2{
            width: 50%;
        }

    </style>
    
</head>
<body>
    
    

    <!-- <div class="container">
        <div class="seccion1">
            <div class="seccion1-det1">
                <h2>Descripción del empleo</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nulla ab officia, rerum possimus animi. Deserunt ad velit voluptatibus quo eum blanditiis aperiam nulla doloribus? Dicta nam cupiditate quis aperiam?</p>
            </div>
            <div class="seccion1-det2">
                <h2>Requerimientos</h2>
                <ul>
                    <li><b>Educación minima: </b></li>
                    <li><b>Disponibilidad de viajar: </b></li>
                    <li><b>Disponibilidad de cambio de residencia: </b></li>
                    <li><b>Personas con discapacidad: </b></li>
                </ul>
            </div>
        </div>
        <div class="seccion2">
            <div class="seccion2-det1">
                <img src="" alt="logo-empresa">
            </div>
            <div class="seccion2-det2">
                <h2>Caracteristicas del empleo</h2>
                <ul>
                    <li><span class="icon-checkmark"></span></li>
                    <li><span class="icon-checkmark"></li>
                    <li><span class="icon-checkmark"></li>
                </ul>
            </div>
        </div>
    </div> -->

</body>
</html>