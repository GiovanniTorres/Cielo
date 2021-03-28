<?php
require_once ("../controllers/TransaccionController.php") ;
/*print*/ $dni_art = $_POST['dni_art'] ;
/*print*/ $articulo_seleccionado = $_POST['articulo_seleccionado'] ;
/*print*/ $usuarionombre = $_POST['usuarionombre'] ;
/*print*/ $cantidad = $_POST['cantidad'] ;

$carritoDNI = $dni_art ;
$articuloDNI = $articulo_seleccionado ;
$clienteDNI = $usuarionombre ;
$ventaDNI = "1" ;
$ca_cantidad = $cantidad + 1 ;
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