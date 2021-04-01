<?php
require_once ("../controllers/TransaccionController.php") ;

/*print*/ $idcarrito = $_POST['idcarrito'] ;
/*print*/ $articulo_seleccionado = $_POST['articulo_seleccionado'] ;
/*print*/ $usuarionombre = $_POST['usuarionombre'] ;
/*print "<br>Cantidad:".  */$cantidad = $_POST['cantidad'] ;
/*print "<br>precio:".    */$precio = $_POST['precio'] ;

$carritoDNI = $idcarrito ;
$articuloDNI = $articulo_seleccionado ;
$clienteDNI = $usuarionombre ;
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