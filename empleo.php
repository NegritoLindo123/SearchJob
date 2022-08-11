<?php require_once "login-register/conexion.php"; ?>
<?php require_once "helpers.php" ?>

<?php 
    $empleo_actual = conseguirEmpleos($conexion,$_GET['id']);
    if(!isset($empleo_actual['codigo'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleo</title>
</head>
<body>
    <h1><?=$empleo_actual['nombre_tc'] ?></h1>
    <h1><?=$empleo_actual['nombre_mu'] ?></h1>
    <a href="empleos.php">empleos</a>
</body>
</html>