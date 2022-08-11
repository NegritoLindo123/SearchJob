<?php
    if($_POST){

        //SE INCLUYE LA CONEXION A LA BD
        include "conexion.php";

        //SE VERIFICA QUE EXISTAN DATOS
        $usuarios= isset($_POST['id']) ? $_POST['id'] : false;
        $contrasena= isset($_POST['contrasena']) ? $_POST['contrasena'] : false;

        //CONSULTA QUE SE EJECUTARÁ
        $consulta="SELECT * FROM usuario where id='$usuarios' and contrasena='$contrasena'";
        $resultado=mysqli_query($conexion,$consulta);

        //SE ALMACENAN LOS CAMPOS EN LA VARIABLE FILAS
        $filas=mysqli_fetch_array($resultado);

        //A UNA SESIÓN USUARIO SE LE ALMACENAN LOS CAMPOS
        $_SESSION['usuario'] = $filas;

        if($filas['perfil']==1){ //Empleado
            header("location:../empleado.php");

        }else
        if($filas['perfil']==2){ //Empresa
        header("location:empresa.php");
        }
        else
        if($filas['perfil']==3){ //Admin
        header("location:admin.php");
        }
        else{
            header("location: login.php");
        }


    }
