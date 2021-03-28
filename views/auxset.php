<?php
require_once ("../controllers/TransaccionController.php") ;
$setAccion = $_POST['setAccion'] ;
$articulo_seleccionado = $_POST['articulo_seleccionado'] ;

if ($setAccion == "modificar") {
    $dni_arti = $_POST['dni_arti'] ;
    $cantidad = $_POST['cantidad'] ;
    print $articulo_seleccionado ;
    print "modificamos cantidades" ;
    $articulo_seleccionado = $_POST['articulo_seleccionado'] ;
    $usuarionombre = $_POST['usuarionombre'] ;

    $carritoDNI = $dni_arti ;
    $articuloDNI = $articulo_seleccionado ;
    $clienteDNI = $usuarionombre ;
    $ventaDNI = "1" ;
    $ca_cantidad = $cantidad+1 ;
    $ca_precio_cant = "1" ;

    $transaccion_data = array (
        "carritoDNI" => $carritoDNI ,
        "articuloDNI" => $articuloDNI ,
        "clienteDNI" => $clienteDNI ,
        "ventaDNI" => $ventaDNI ,
        "ca_cantidad" => $ca_cantidad ,
        "ca_precio_cant" => $ca_precio_cant
    );
} elseif ($setAccion == "insertar") {
    print "insertar" ;
    $articulo_seleccionado = $_POST['articulo_seleccionado'] ;
    $usuarionombre = $_POST['usuarionombre'] ;

    $carritoDNI = NULL ;
    $articuloDNI = $articulo_seleccionado ;
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
}
$transaccioncontroller = new TransaccionController () ;
$settransaccion = $transaccioncontroller->setTransaccion ($transaccion_data) ;