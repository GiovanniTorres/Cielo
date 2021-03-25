<?php
require_once ("../controllers/TransaccionController.php") ;
$objeto_articulo = $_POST['objeto_articulo'] ;
$usuarionombre = $_POST['usuarionombre'] ;

$carritoDNI = NULL ;
$articuloDNI = $objeto_articulo ;
$clienteDNI = $usuarionombre ;
$ventaDNI = "1" ;
$ca_cantidad = "1" ;
$ca_precio_cant = "1" ;

$transaccion_data = array (
    "carritoDNI" => $carritoDNI ,
    "articuloDNI" => $articuloDNI ,
    "clienteDNI" => $clienteDNI ,
    "ventaDNI" => $ventaDNI ,
    "ca_cantidad" => $ca_cantidad ,
    "ca_precio_cant" => $ca_precio_cant
);
$transaccioncontroller = new TransaccionController () ;
$settransaccion = $transaccioncontroller->setTransaccion ($transaccion_data) ;
