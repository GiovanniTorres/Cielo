<?php
require_once ("../controllers/TransaccionController.php") ;
$gio = $_POST['gio'] ;
$usuarionombre = $_POST['usuarionombre'] ;
if (empty($gio)) {
    echo "Vacio controllers" ;
} else {
    echo "Recibido - controllers".$gio.$usuarionombre ;    
    $carritoDNI = NULL ;
    $articuloDNI = $gio ;
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
}


?>