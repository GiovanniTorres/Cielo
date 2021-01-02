<?php
    $clienteDNI = NULL ;
    $adminDNI = 1 ;
    $cl_nombre = isset ($_POST["cl_nombre"]) ? $_POST["cl_nombre"] : NULL ;
    $cl_apellidos = isset ($_POST["cl_apellidos"]) ? $_POST["cl_apellidos"] : NULL ;
    $cl_usuario = isset ($_POST["cl_usuario"]) ? $_POST["cl_usuario"] : NULL ;
    $cl_password = isset ($_POST["cl_password"]) ? $_POST["cl_password"] : NULL ;
    $cl_edad = isset ($_POST["cl_edad"]) ? $_POST["cl_edad"] : NULL ;
    $cl_rfc = isset ($_POST["cl_rfc"]) ? $_POST["cl_rfc"] : NULL ;
    $cl_telefono = isset ($_POST["cl_telefono"]) ? $_POST["cl_telefono"] : NULL ;
    $cl_mail = isset ($_POST["cl_mail"]) ? $_POST["cl_mail"] : NULL ;
    $cl_direccion = isset ($_POST["cl_direccion"]) ? $_POST["cl_direccion"] : NULL ;
    $cl_cp = isset ($_POST["cl_cp"]) ? $_POST["cl_cp"] : NULL ;
    $cl_sello_digital = isset ($_POST["cl_sello_digital"]) ? $_POST["cl_sello_digital"] : NULL ;
    $cl_razon_social = isset ($_POST["cl_razon_social"]) ? $_POST["cl_razon_social"] : NULL ;
    $cl_mensaje = isset ($_POST["cl_mensaje"]) ? $_POST["cl_mensaje"] : NULL ;

    if (isset ($cl_nombre)) {
        if (empty($cl_nombre) ) {
            ?><script> alert ("Escribe tu nombre") ; </script><?php
        } elseif (empty($cl_apellidos)) {
            ?><script> alert ("Escribe tu apellidos") ; </script><?php
        } elseif (empty($cl_usuario)) {
            ?><script> alert ("Escribe tu apellidos") ; </script><?php
        } elseif (empty($cl_password)) {
            ?><script> alert ("Escribe tu apellidos") ; </script><?php
        } elseif (empty($cl_telefono)) {
            ?><script> alert ("Escribe tu apellidos") ; </script><?php
        } elseif (empty($cl_mail)) {
            ?><script> alert ("Escribe tu apellidos") ; </script><?php
        } elseif (empty($cl_mensaje)) {
            ?><script> alert ("Escribe tu apellidos") ; </script><?php
        } else {
            $cliente_data = array (
                "clienteDNI" => $clienteDNI ,
                "adminDNI" => $adminDNI ,
                "cl_nombre" => $cl_nombre ,
                "cl_apellidos" => $cl_apellidos ,
                "cl_usuario" => $cl_usuario ,
                "cl_password" => $cl_password ,
                "cl_edad" => $cl_edad ,
                "cl_rfc" => $cl_rfc ,
                "cl_telefono" => $cl_telefono ,
                "cl_mail" => $cl_mail ,
                "cl_direccion" => $cl_direccion ,
                "cl_cp" => $cl_cp ,
                "cl_sello_digital" => $cl_sello_digital ,
                "cl_razon_social" => $cl_razon_social ,
                "cl_mensaje" => $cl_mensaje
            ) ;
        
            $clientecontroller = new ClienteController () ;
            $clientecontroller->setCliente ($cliente_data) ;
        }
    }
    
?>