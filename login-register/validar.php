<?php
    if($_POST){

        include "conexion.php";

        $usuarios= isset($_POST['id']) ? $_POST['id'] : false;
        $contrasena= isset($_POST['contrasena']) ? $_POST['contrasena'] : false;

        $_SESSION['id']=$usuarios;

        $consulta="SELECT * FROM usuario where id='$usuarios' and contrasena='$contrasena'";

        $resultado=mysqli_query($conexion,$consulta);

        $filas=mysqli_fetch_array($resultado);

        $_SESSION['usuario'] = $filas;

        if($filas['perfil']==1){ //Empleado
            header("location:empleado.php");

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
