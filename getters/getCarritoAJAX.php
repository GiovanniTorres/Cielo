<?php
require_once ("../controllers/CarritoControllerAJAX.php") ;
$accion = $_POST['accion'] ;
$nombre_usuario = $_POST['nombre_usuario'] ;
$carrito = "" ;
$car = "" ;
$carritocontroller = new CarritoControllerAJAX () ;
$getCarrito = $carritocontroller->carritoGet ($carrito = $car) ;
$countcarrito = count ($getCarrito) ;

if ($accion == 'mostrar') {
    print "mostrar tabla" ;
    print "
    <table>
        <tbody>
    " ;
    for ($i=0; $i < $countcarrito; $i++) { 
        $numeracion = $i + 1 ;
        if ($getCarrito [$i]["cl_usuario"] == $nombre_usuario) {
            print "
            <tr>
            <td class='p-2 text-center' width='59'>".$numeracion."</td>
            <td class='p-2 text-center' width='59'><img src='http://localhost/imagenes/imagen".$getCarrito [$i]["articuloDNI"].".jpg' width='100%'</td>
            <td class='p-2 text-center' width='59'>".$getCarrito [$i]["ar_nombre"]."</td>
            <td class='p-2 text-center' width='59'>".$getCarrito [$i]["ca_cantidad"]."</td>
            <td class='p-2 text-center' width='59'>".$getCarrito [$i]["ca_cantidad"]."</td>
            <!--td class='p-2 text-center'>".$getCarrito [$i]["cl_usuario"]."</td-->
            </tr>
            ";
        }  
    }
    print "
        </tbody>
    </table>
    " ;
} elseif ($accion == 'verificar') {
    $objeto_seleccionado = $_POST['objeto_seleccionado'] ;
    $zz = 0 ;
    print "verificar existencias" ;
    print "
    <table>
        <tbody>
    " ;
    for ($i=0; $i < $countcarrito; $i++) { 
        if ($getCarrito [$i]["articuloDNI"] == $objeto_seleccionado) {
            $zz = 1 ;
        }
        $numeracion = $i + 1 ;
        if ($getCarrito [$i]["cl_usuario"] == $nombre_usuario) {
            print "
            <tr>
            <td class='p-2 text-center' width='59'>".$numeracion."</td>
            <td class='p-2 text-center' width='59'><img src='http://localhost/imagenes/imagen".$getCarrito [$i]["articuloDNI"].".jpg' width='100%'</td>
            <td class='p-2 text-center' width='59'>".$getCarrito [$i]["ar_nombre"]."</td>
            <td class='p-2 text-center' width='59'>".$getCarrito [$i]["ca_cantidad"]."</td>
            <td class='p-2 text-center' width='59'>".$getCarrito [$i]["ca_cantidad"]."</td>
            <!--td class='p-2 text-center'>".$getCarrito [$i]["cl_usuario"]."</td-->
            </tr>
            ";
        }  
    }
    print "
        </tbody>
    </table>
    " ;

    if ($zz == 1) { print "<div id='exist' data-id='1'></div>" ;} 
    else { print "<div id='exist' data-id='0'></div>" ; }
}

?>
<script src="http://localhost/public/js/transaccion.js"></script>