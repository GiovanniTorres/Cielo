<?php
require_once ("../controllers/TransaccionController.php") ;
$idCarrito = $_POST['idCarrito'] ;
$idArticulo = $_POST['idArticulo'] ;
$idVentas = $_POST['idVentas'] ;
$cantidad = $_POST['cantidad'] ;
$precio = $_POST['precio'] ;

$carritoDNI = $idCarrito ;
$articuloDNI = $idArticulo ;
$ventaDNI = $idVentas ;
$ca_cantidad = $cantidad ;
$ca_precio_cant = $precio ;

$transaccion_data = array (
    "carritoDNI" => $carritoDNI ,
    "articuloDNI" => $articuloDNI ,
    "ventaDNI" => $ventaDNI ,
    "ca_cantidad" => $ca_cantidad ,
    "ca_precio_cant" => $ca_precio_cant
);

$transaccioncontroller = new TransaccionController () ;
$settransaccion = $transaccioncontroller->setTransaccion ($transaccion_data) ;