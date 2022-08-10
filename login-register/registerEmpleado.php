<?php require_once "../helpers.php" ?>
<?php require_once "conexion.php" ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <form action="guardarEmpleado.php" method="POST" enctype="multipart/form-data">
                    
                    <h1>Sistema de Registro Empleado</h1>
                    <p>Identificación
                        <input type="text" placeholder="Ingrese su documento de identidad" name="id" >
                    </p>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'id') : ''; ?>

                    <p>Nombre
                        <input type="text" placeholder="Ingrese su nombre" name="name">
                    </p>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'nombre') : ''; ?>

                    <p>Apellido
                        <input type="text" placeholder="Ingrese su apellido" name="lastname" >
                    </p>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'apellido') : ''; ?>

                    <p>Teléfono
                        <input type="text" placeholder="Ingrese su telefono" name="phonenumber" >
                    </p>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'telefono') : ''; ?>

                    <p>Dirección
                        <input type="text" placeholder="Ingrese la dirección" name="direction" >
                    </p>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'direccion') : ''; ?>

                    <p>Correo
                        <input type="text" placeholder="Ingrese su correo" name="email">
                    </p>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'email') : ''; ?>

                    <p>Contraseña
                        <input type="password" placeholder="Ingrese su contraseña" name="password" >
                    </p>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'contrasena') : ''; ?>

                    <p>Perfil
                        <input type="text" placeholder="Empleado" name="profile" disabled>
                    </p>
                    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'perfil') : ''; ?>

                    <p>Hoja de vida
                        <input type="file" placeholder="Seleccione su hoja de vida" name="hojavida">
                    </p>
                    
                    <input type="submit" value="Registrarse">
                    <br><br>
                    <a href="login.php" class="login">Iniciar sesion</a>
            </form>
            <?php borrarErrores(); ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        </body>
</html>