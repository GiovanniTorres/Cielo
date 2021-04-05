<?php
require_once ("../controllers/TransaccionController.php") ;

$usuario = $_POST['usuario'] ;
$id_carrito = $_POST['id_carrito'] ;
$id_articulo = $_POST['id_articulo'] ;
$cantidad = $_POST['cantidad'] ;
$precio = $_POST['precio'] ;

print "usuario: ".$usuario ;
print "<br>id_carrito: ".$id_carrito ;
print "<br>id_articulo: ".$id_articulo ;
print "<br>cantidad: ".$cantidad ;
print "<br>precio: ".$precio ;

$carritoDNI = $id_carrito ;
$articuloDNI = $id_articulo ;
$clienteDNI = $usuario ;
$ventaDNI = "1" ;
$ca_cantidad = $cantidad ;
$ca_precio_cant = $precio ;

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