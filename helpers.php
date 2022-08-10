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

    function conseguirEmpleos($conexion){

        $sql = "SELECT em.*, mu.nombre, ca.nombre, se.nombre, tc.nombre FROM empleo as em ".
        " INNER JOIN municipio as mu ON em.municipio = mu.codigo ".
        " INNER JOIN cargo as ca ON em.cargo = ca.codigo ".
        " INNER JOIN sector as se ON em.sector = se.codigo ".
        " INNER JOIN tipo_contrato as tc ON em.tipo_contrato = tc.codigo";
        $empleos = mysqli_query($conexion,$sql);

        $resultado = array();

        if($empleos && mysqli_num_rows($empleos)){

            $resultado = mysqli_fetch_assoc($empleos);

        }

        return $resultado;

    }