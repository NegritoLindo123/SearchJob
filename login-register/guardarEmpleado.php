<?php

//EVALUAR QUE HALLA LLEGADO EL METODO POST
if(isset($_POST)){

    //INCLUIR LA CONEXIÓN
    include "conexion.php";

    //ALMACENAMIENTO DE LOS CAMPOS EN VARIABLES EN CASO DE QUE EXISTAN
    //COMPROBACIÓN PARA EVITAR SLQ INYECCION
    $id = isset($_POST["id"]) ? mysqli_real_escape_string($conexion,$_POST['id']) : false;
    $nombre = isset($_POST["name"]) ? mysqli_real_escape_string($conexion,$_POST['name']) : false;
    $apellido = isset($_POST["lastname"]) ? mysqli_real_escape_string($conexion,$_POST['lastname']) : false;
    $telefono = isset($_POST["phonenumber"]) ? (int)$_POST['phonenumber'] : false;
    $direccion = isset($_POST["direction"]) ? mysqli_real_escape_string($conexion,$_POST['direction']) : false;
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($conexion,$_POST['email']) : false;
    $contrasena = isset($_POST["password"]) ? mysqli_real_escape_string($conexion,$_POST['password']) : false;
    $perfil = 1;

    //ARRAY PARA LOS ERRORES
    $errores = array();

    //VALIDACIÓN PARA EL ID
    if(!empty($id) && is_numeric($id) && preg_match("/[0-9]/",$id)){
        $id_validado = true;
    }else{
        $id_validado = false;
        $errores['id'] = "Solo se permiten numeros";
    }

    //VALIDACIÓN PARA EL NOMBRE
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "No se permiten numeros en este campo";
    }

    //VALIDACIÓN PARA LOS APELLIDOS
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/",$apellido)){
        $apellido_validado = true;
    }else{
        $apellido_validado = false;
        $errores['apellido'] = "No se permiten numeros en este campo";
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


    //VALIDACIÓN DE QUE NO HALLAN ERRORES
    if(count($errores) == 0){

            //INSERCION DEL ARCHIVO (HOJA DE VIDA)
            $nombre_base = basename($_FILES["hojavida"]["name"]);
            //SACAR FECHA PARA EL ARCHIVO
            $nombre_final = date("m-d-y")."-".date("H-i-s")."-".$nombre_base;
            $ruta = "archivos/".$nombre_final;
            $subir_archivo = move_uploaded_file($_FILES["hojavida"]["tmp_name"], $ruta);
                //VALIDACIÓN PARA SABER SI EL ARCHIVO ESTÁ SUBIDO
                if($subir_archivo){
                    $insertarSQL = "INSERT INTO usuario (id, nombre, apellido, telefono, direccion, correo, contrasena, perfil, hoja_vida) 
                    VALUES('$id', '$nombre', '$apellido', '$telefono', '$direccion', '$email', '$contrasena', '$perfil', '$ruta')";
                }
                //SI NO ESTÁ SUBIDO, SE SUBE A LA BASE DE DATOS COMO NULL
                else{
                    $insertarSQL = "INSERT INTO usuario (id, nombre, apellido, telefono, direccion, correo, contrasena, perfil, hoja_vida) 
                            VALUES('$id', '$nombre', '$apellido', '$telefono', '$direccion', '$email', '$contrasena', '$perfil', null)";
                }
                //ALMACENAMIENTO RESULTADO DE LA CONSULTA
                $resultado = mysqli_query($conexion, $insertarSQL);
                //SI LA CONSULTA ES TRUE:
                if($resultado){
                    echo"<script>alert('Se ha cargado la información con éxito'); window.location = 'login.html'</script>";
                }
                //SI LA CONSULTA NO SE EJECUTA
                else{
                    printf("Errormessage: %s\n", mysqli_error($conexion));
                }
        
    }
    //ALMACENAMIENTO DE LOS ERRORES EN UNA SESsION DE ERRORES
    //REDIRECCIONAMIENTO
    else{
        $_SESSION['errores'] = $errores;
        header("Location: registerEmpleado.php");
    }

}