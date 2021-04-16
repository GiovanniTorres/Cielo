<?php
require_once ("../controllers/VentasController.php") ;
$usuario = $_POST['usuario'] ;
$status = $_POST['status'] ;

$ventaDNI      = null ;
$clienteDNI    = $usuario ;
$adminDNI      = "1" ;
$ve_fecha_hora = "2020-11-18 00:00:01" ;
$ve_total      = "0" ;
$ve_statpaq    = "Pendiente" ;

$venta_data = array (
    "ventaDNI" => $ventaDNI ,
    "clienteDNI" => $clienteDNI ,
    "adminDNI" => $adminDNI ,
    "ve_fecha_hora" => $ve_fecha_hora ,
    "ve_total" => $ve_total ,
    "ve_statpaq" => $ve_statpaq
);

$ventascontroller = new VentasController () ;
$setventas = $ventascontroller->setVentas ($venta_data) ;