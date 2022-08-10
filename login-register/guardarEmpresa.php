<?php

if(isset($_POST)){

    include "conexion.php";

    $nit = isset($_POST['nit']) ? mysqli_real_escape_string($conexion,$_POST['nit']) : false;
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']) : false;
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conexion,$_POST['telefono']) : false;
    $direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conexion,$_POST['direccion']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion,$_POST['email']) : false;
    $contrasena = isset($_POST['contrasena']) ? mysqli_real_escape_string($conexion,$_POST['contrasena']) : false;
    $perfil = 2;

    //VARIABLE DE ERRORES
    $errores = array();

    //VALIDACIÓN PARA EL NIT
    if(!empty($nit) && is_numeric($nit) && preg_match("/[0-9]/",$nit)){
        $nit_validado = true;
    }else{
        $nit_validado = false;
        $errores['nit'] = "Solo se permiten numeros";
    }

    //VALIDACIÓN PARA EL NOMBRE
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "No se permiten numeros en este campo";
    }

    //VALIDACIÓN PARA EL TELEFONO
    if(!empty($telefono) && is_numeric($telefono) && preg_match("/[0-9]/",$telefono)){
        $telefono_validado = true;
    }else{
        $telefono_validado = false;
        $errores['telefono'] = "Solo se permiten numeros";
    }

    //VALIDACIÓN PARA LA DIRECCIÓN
    if(!empty($direccion)){
        $direccion_validado = true;
    }else{
        $errores['direccion'] = "La dirección está vacía";
    }

    //VALIDACIÓN PARA EL CORREO
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $errores['email'] = "Formato de correo invalido";
    }

    //VALIDACIÓN PARA LA CONTRASEÑA
    if(!empty($contrasena)){
        $contrasena_validado = true;
    }else{
        $errores['contrasena'] = "La contraseña no puede estár vacía";
    }

    //VALIDACIÓN PARA EL PERFIL
    if(!empty($perfil) && is_numeric($perfil) && preg_match("/[0-9]/",$perfil)){
        $perfil_validado = true;
    }else{
        $errores['perfil'] = "Perfil no valido";
    }

    //VALIDACION DE QUE NO HAYAN ERRORES
    if(count($errores)==0){

        $insertarSQL = "INSERT INTO usuario (id, nombre, apellido, telefono, direccion, correo, contrasena, perfil, hoja_vida) 
                    VALUES('$nit', '$nombre', null, '$telefono', '$direccion', '$email', '$contrasena', '$perfil', null)";
        $resultado = mysqli_query($conexion, $insertarSQL);
        if($resultado){
            echo"<script>alert('Se ha cargado la información con éxito'); window.location = 'login.html'</script>";
        }else{
            printf("Errormessage: %s\n", mysqli_error($conexion));
        }

    }else{

        $_SESSION['errores'] = $errores;
        header("Location: registerEmpresa.php");

    }

}else{

    header("Location: registerEmpresa.php");

}

?>