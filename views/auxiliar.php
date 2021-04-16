<?php
require_once ("../controllers/CarritoControllerAJAX.php") ;

/*print "1. Usuario: ".*/       $usuario = $_POST['usuario'] ;
/*print "<br>2. Articulo: ".*/  $articulo_seleccionado = $_POST['articulo_seleccionado'] ;
/*print "<br>3. Precio: ".*/    $precio = $_POST['precio'] ;
/*print "<br>4. " .*/           $accion = ($articulo_seleccionado == 0) ? "Mostrar" : "Procesar" ;


$carrito = "" ;
$car = "" ;
$carritocontroller = new CarritoControllerAJAX () ;
$getCarrito = $carritocontroller->carritoGet ($carrito = $car) ;
$countcarrito = count ($getCarrito) ;

$analizado = "" ;
$idcarrito = "" ;

for ($i=0; $i < $countcarrito; $i++) { 
    if ($getCarrito [$i]["articuloDNI"] == $articulo_seleccionado) {
        $analizado = 1 ;
        $idcarrito = $i+1;
    }
    $numeracion = $i + 1 ;
    if ($getCarrito [$i]["cl_usuario"] == $usuario) {
        print "
        <tr>
        <td width='1%' class='pt-2 text-center xx_small'>".$numeracion."</td>
        <td width='1%' class='pt-2 text-center xx_small'><img src='http://localhost/imagenes/imagen".$getCarrito [$i]["articuloDNI"].".jpg' width='60%'</td>
        <td width='1%' class='text-center xx_small'>".$getCarrito [$i]["ar_nombre"]."</td>
        <td width='1%' class='pt-2 text-center xx_small'>".$getCarrito [$i]["ca_cantidad"]."</td> " ;
        print "
        <td width='1%' class='pt-2 text-center xx_small'>".($getCarrito [$i]["ca_precio_cant"])."</td>
        </tr>
        ";
        if ($getCarrito [$i]["articuloDNI"] == $articulo_seleccionado) {
            $cantidad = $getCarrito [$i]["ca_cantidad"] ;
            $precio = $getCarrito [$i]["ar_precio"] ;
        }
    }  
}

if ($accion == "Procesar") {
    if ($analizado == 1) {
        $cantidad = $cantidad + 1 ;
        $precio = $precio * $cantidad ;
        //print "Existe" ;
        print "<div id='exist' data-id='1'></div>" ;
        print "<br>Dni Carrito: ".  $idcarrito ;
        print "<br>Dni Art: ".      $articulo_seleccionado ;
        print "<br>Cantidad: ".     $cantidad ;
        print "<br>Precio: ".       $precio ;
    } elseif ($analizado == 0) {
        $idcarrito = null ;
        $cantidad = 1 ;
        //$precio = $precio * $cantidad ;
        //print "No existe" ;
        print "<div id='exist' data-id='0'></div>" ;
        print "<br>Dni Carrito: ".  $idcarrito ;
        print "<br>Dni Art: ".      $articulo_seleccionado ;
        print "<br>Cantidad: ".     $cantidad ;
        print "<br>Precio: ".       $precio ;
    }

    print "<div id='idcarrito' data-id='".$idcarrito."'></div>" ;
    print "<div id='articulo_seleccionado' data-id='".$articulo_seleccionado."'></div>" ;
    print "<div id='cantidad' data-id='".$cantidad."'></div>" ;
    print "<div id='precio' data-id='".$precio."'></div>" ;
    
}