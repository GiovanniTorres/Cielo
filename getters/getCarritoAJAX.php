<?php
require_once ("../controllers/CarritoControllerAJAX.php") ;

print $usuario =  $_POST['usuario'] ;
print $id_articulo = $_POST['id_articulo'] ;
print $precio = $_POST['precio'] ;
$id_carrito = "" ;
$cantidad = "" ;
$total = 0 ;

$carrito = "" ;
$car = "" ;
$carritocontroller = new CarritoControllerAJAX () ;
$getCarrito = $carritocontroller->carritoGet ($carrito = $car) ;
$countcarrito = count ($getCarrito) ;
$numeracion = "" ;
$existencia = "" ;
$cantidad = "" ;

if ($id_articulo == 0) {
    for ($i=0; $i < $countcarrito; $i++) { 
        if ($getCarrito [$i]["clienteDNI"] == $usuario) {
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
        }
    }
} else {
        /*print "<br><br>Usuario: ".*/  $usuario = $usuario ;
        /*print "<br>id_carrito: ". */  $id_carrito = null ;
        /*print "<br>id_articulo: ".*/  $id_articulo = $id_articulo ;
        /*print "<br>cantidad: ".   */  $cantidad = 1 ;
        /*print "<br>precio: ".     */  $precio = $precio ;
                                        $existencia = 1 ;
    for ($i=0; $i < $countcarrito; $i++) { 
        if ($getCarrito [$i]["articuloDNI"] == $id_articulo && $getCarrito [$i]["clienteDNI"] == $usuario) {
            /*print "<br><br>Usuario: ".*/  $usuario = $usuario ;
            /*print "<br>id_carrito: ". */  $id_carrito = $getCarrito [$i]["carritoDNI"] ;
            /*print "<br>id_articulo: ".*/  $id_articulo = $id_articulo ;
            /*print "<br>cantidad: ".   */  $cantidad = $getCarrito [$i]["ca_cantidad"] + 1 ;
            /*print "<br>precio: ".     */  $precio = $getCarrito [$i]["ar_precio"] * $cantidad ;
                                            $existencia = 1 ;
        }
    }
}



        print "<br><br><br><br>Usuario: ".$usuario ;
        print "<br>id_carrito: ".$id_carrito ;
        print "<br>id_articulo: ".$id_articulo ;
        print "<br>cantidadd: ".$cantidad ;
        print "<br>precio: ".$precio ;
        print "<br>existencia: ".$existencia ;
        print "<br>Total: ".$total ;

        print "<div id='existencia' data-id='".$existencia."'></div>" ;
        print "<div id='usuario' data-id='".$usuario."'></div>" ;
        print "<div id='id_carrito' data-id='".$id_carrito."'></div>" ;
        print "<div id='id_articulo' data-id='".$id_articulo."'></div>" ;
        print "<div id='cantidad' data-id='".$cantidad."'></div>" ;
        print "<div id='precio' data-id='".$precio."'></div>" ;
        print "<div id='total' data-id='".$total."'></div>" ;

        $existencia = 0 ;