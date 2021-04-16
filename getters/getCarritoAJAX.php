<?php
require_once ($_SERVER['DOCUMENT_ROOT']."/controllers/CarritoController.php") ;

$idVentas = $_POST['idVentas'] ;
$idArticulo = $_POST['idArticulo'] ;
$precio = $_POST['precio'] ;
$idCarrito = "" ;
$cantidad = "" ;
$total = 0 ;

$carrito = "" ;
$car = "" ;

$carritocontroller = new CarritoController () ;
$getCarrito = $carritocontroller->carritoGetAjax ($carrito = $car) ;
$countcarrito = count ($getCarrito) ;

$numeracion = "" ;
$analizado = "" ;
$cantidad = "" ;
$status = "" ;

if ($idArticulo == 0) {
    for ($i=0; $i < $countcarrito; $i++) { 
        if ($getCarrito [$i]["ventaDNI"] == $idVentas && $getCarrito [$i]["ve_statpaq"] == "Pendiente") {
            print "
            <tr>
            <td width='1%' class='pt-2 text-center xx_small'>".($i+1)."</td>
            <td width='1%' class='pt-2 text-center xx_small'><img src='http://localhost/imagenes/imagen".$getCarrito [$i]["articuloDNI"].".jpg' width='60%'</td>
            <td width='1%' class='text-center xx_small'>".$getCarrito [$i]["ar_nombre"]."</td>
            <td width='1%' class='pt-2 text-center xx_small'>".$getCarrito [$i]["ca_cantidad"]."</td>
            <td width='1%' class='pt-2 text-center xx_small'>".$getCarrito [$i]["ca_precio_cant"]."</td>
            </tr>
            ";
            $total = $total + $getCarrito [$i]["ca_precio_cant"] ;
            $status = $getCarrito [$i]["ve_statpaq"] ;
            
        }
    }
} else {
        $idVentas = $idVentas ;
        $idCarrito = null ;
        $idArticulo = $idArticulo ;
        $cantidad = 1 ;
        $precio = $precio ;
        $analizado = 1 ;
    for ($i=0; $i < $countcarrito; $i++) { 
        if ($getCarrito [$i]["articuloDNI"] == $idArticulo && $getCarrito [$i]["ventaDNI"] == $idVentas) {
            $idVentas = $idVentas ;
            $idCarrito = $getCarrito [$i]["carritoDNI"] ;
            $idArticulo = $idArticulo ;
            $cantidad = $getCarrito [$i]["ca_cantidad"] + 1 ;
            $precio = $getCarrito [$i]["ar_precio"] * $cantidad ;
            $analizado = 1 ;
        }
    }
}

        print "<div id='analizado' data-id='".$analizado."'></div>" ;
        print "<div id='idVentas' data-id='".$idVentas."'></div>" ;
        print "<div id='idCarrito' data-id='".$idCarrito."'></div>" ;
        print "<div id='idArticulo' data-id='".$idArticulo."'></div>" ;
        print "<div id='cantidad' data-id='".$cantidad."'></div>" ;
        print "<div id='precio' data-id='".$precio."'></div>" ;
        print "<div id='tottal' data-id='".$total."'></div>" ;
        print "<div id='status' data-id='".$status."'></div>" ;
        $analizado = 0 ;