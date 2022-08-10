<?php include "conexion.php"; ?>
<?php include "../helpers.php"; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/cabecera.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        <style>

            a.login {
                background: #4488ee;
                color: #fff;
                margin: 30px 10px;
                padding: 10px 40px;
                text-decoration: none;
            }

        </style>
    </head>
        <body>
            <form action="guardarEmpresa.php" method="POST" enctype="multipart/form-data">
                <h1>Sistema de Registro Empresa</h1>
                <p>NIT
                    <input type="text" placeholder="ingrese el NIT de la empresa" name="nit" >
                </p>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'nit') : ""; ?>

                <p>Nombre
                    <input type="text" placeholder="ingrese el nombre de la empresa" name="nombre" >
                </p>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'nombre') : ""; ?>

                <p>Teléfono
                    <input type="text" placeholder="ingrese su telefono" name="telefono" >
                </p>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'telefono') : ""; ?>

                <p>Dirección
                    <input type="text" placeholder="ingrese la dirección" name="direccion" >
                </p>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'direccion') : ""; ?>

                <p>Correo
                    <input type="text" placeholder="ingrese el correo empresarial" name="email">
                </p>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'email') : ""; ?>

                <p>Contraseña
                    <input type="password" placeholder="ingrese la contraseña" name="contrasena" >
                </p>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'contrasena') : ""; ?>

                <p>Perfil
                    <input type="text" placeholder="Empresa" name="perfil" disabled>
                </p>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'perfil') : ""; ?>
                
                <input type="submit" value="Registrarse">
                <br><br>
                <a href="login.php" class="login">Iniciar sesion</a>
            </form>
            <?php borrarErrores(); ?>
        </body>
</html>