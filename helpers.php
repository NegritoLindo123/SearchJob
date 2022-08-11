<?php

    function mostrarErrores($error,$campo){

        $alerta = "";

        if(isset($error[$campo]) && !empty($campo)){
            
            $alerta = "<div class='alerta alerta-error'><p style='background:red;'>"
            .$error[$campo].
            "</p></div>";

        }

        return $alerta;

    }

    function borrarErrores(){

        if(isset($_SESSION['errores'])){

            unset($_SESSION['errores']);

        }

    }

    function conseguirMunicipios($conexion){

        $sql = "SELECT * FROM municipio ORDER BY nombre ASC";
        $consulta = mysqli_query($conexion,$sql);

        $resultado = array();

        if($consulta && mysqli_num_rows($consulta) >= 1){

            $resultado = $consulta;

        }

        return $resultado;

    }

    function conseguirEmpleo($conexion,$nombre = null,$municipio = null){

        $sql = "SELECT * FROM empleo ";
        
        if(!empty($nombre) && !empty($municipio) && $municipio != "ninguno"){
            $sql .= "WHERE nombre LIKE '%$nombre%' and municipio='$municipio' ";
        }
        if(!empty($nombre) && $municipio == "ninguno"){
            $sql .= "WHERE nombre LIKE '%$nombre%' ";
        }
        if(empty($nombre) && $municipio == "ninguno"){
            $sql .= " ";
        }
        if(empty($nombre) && !empty($municipio) &&  $municipio != "ninguno"){
            $sql .= "WHERE municipio='$municipio' ";
        }   

        $consulta = mysqli_query($conexion,$sql);

        $resultado = array();
        if($consulta && mysqli_num_rows($consulta) >= 1){
            $resultado = $consulta;
        }

        return $resultado;

    }

    function conseguirEmpleos($conexion,$id){

        $sql = " SELECT em.*, mu.nombre as 'nombre_mu', ca.nombre, se.nombre, tc.nombre as 'nombre_tc' ".
        " FROM empleo as em INNER JOIN municipio as mu ".
        " ON em.municipio = mu.codigo ".
        " INNER JOIN cargo as ca ".
        " ON em.cargo = ca.codigo ".
        " INNER JOIN sector as se ".
        " ON em.sector = se.codigo ".
        " INNER JOIN tipo_contrato as tc ".
        " ON em.tipo_contrato = tc.codigo ";
        $empleo = mysqli_query($conexion,$sql);

        $resultado = array();

        if($empleo && mysqli_num_rows($empleo) >= 1){
            $resultado = mysqli_fetch_assoc($empleo);
        }

        return $resultado;

    }