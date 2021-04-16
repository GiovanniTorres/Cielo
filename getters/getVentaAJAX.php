<?php
require_once ("../controllers/VentasController.php") ;
$venta = "" ;
$idVenta = "" ;
$vnt = "" ;
$ventacontroller = new VentasController () ;
$getVenta = $ventacontroller->getVentasAjax ($venta = $vnt) ;
$countventa = count ($getVenta) ;
$usuario = $_POST['usuario'] ;
$status = "" ;

for ($i=0; $i < $countventa; $i++) { 
    if ($getVenta [$i]["clienteDNI"] == $usuario && $getVenta [$i]["ve_statpaq"] == "Pendiente") {
        $idVenta = $getVenta [$i]["ventaDNI"] ;
        $status = $getVenta [$i]["ve_statpaq"] ;
    }
}


print "<div id='idVentas' data-id='".$idVenta."'></div>" ;
print "<div id='status' data-id='".$status."'></div>" ;
print "<div id='countventas' data-id='".$countventa."'></div>" ;