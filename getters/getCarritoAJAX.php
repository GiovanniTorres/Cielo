<?php
require_once ("../controllers/CarritoControllerAJAX.php") ;
$id = "" ;
$dni_arti = "" ;
$verificar = "" ;
/*print "Usuario: ". */$usuario = $_POST['usuario'] ;
/*print "<br>Articulo seleccionado: ". */$articulo_seleccionado = $_POST['articulo_seleccionado'] ;
$accion = ($articulo_seleccionado == 0) ? "Mostrar" : "Insertar" ;

$carrito = "" ;
$car = "" ;
$carritocontroller = new CarritoControllerAJAX () ;
$getCarrito = $carritocontroller->carritoGet ($carrito = $car) ;
$countcarrito = count ($getCarrito) ;


print "
    <!--table-->
        <!--tbody-->
    " ;
    for ($i=0; $i < $countcarrito; $i++) { 
        if ($getCarrito [$i]["articuloDNI"] == $articulo_seleccionado) {
            $verificar = 1 ;
            $dni_arti = $i+1;
        }
        $numeracion = $i + 1 ;
        if ($getCarrito [$i]["cl_usuario"] == $usuario) {
            print "
            <tr>
            <td width='1%' class='bg-4 pt-2 text-center xx_small'>".$numeracion."</td>
            <td class='pt-2 text-center xx_small'><img src='http://localhost/imagenes/imagen".$getCarrito [$i]["articuloDNI"].".jpg' width='60%'</td>
            <!--td class='text-center xx_small'>".$getCarrito [$i]["ar_nombre"]."</td-->
            <td class='pt-2 text-center xx_small'>".$getCarrito [$i]["ca_cantidad"]."</td> " ;
            if ($getCarrito [$i]["articuloDNI"] == $articulo_seleccionado) {
                $cantidad = $getCarrito [$i]["ca_cantidad"] ;
            }
            print "
            <td class='pt-2 text-center xx_small'>".($getCarrito [$i]["ca_precio_cant"])."</td>
            <td class='pt-2 text-center xx_small'><div id='agree'><a href='#' class='btn mover'>1</a></div></td>
            <td class='pt-2 text-center xx_small'><div id='degree'><a href='#' class='btn mover1'>1</a></div></td>
            <td class='pt-2 text-center xx_small'><div id='trash'><a href='#' class='btn mover2'>1</a></div></td>
            </tr>


            <!--div><a href='#' data-id='".$numeracion."' class='btn' id='agree'><img src='http://localhost/imagenes/SVG/agree.svg'>".$numeracion."</a-->
            <!--div><a href='#' data-id='".$numeracion."' class='btn' id='degree'><img src='http://localhost/imagenes/SVG/degree.svg'>".$numeracion."</a-->
            <!--div><a href='#' data-id='".$numeracion."' class='btn' id='trash'><img src='http://localhost/imagenes/SVG/trash.svg'>".$numeracion."</a-->
            ";
        }  
    }
    print "
        <!--/tbody>
    </table-->
    " ;
    
    if ($accion == "Mostrar") {
        //print $accion ;
    } else {
        //print $accion ;
        if ($verificar == 1) {
            print "<br>ID: ".$dni_arti ;
            print "<br>Articulo: ".$articulo_seleccionado ;
            print "<br>Carrito: ".$cantidad ;
            print "<br>Ya existe" ;
            print "<div id='exist' data-id='1'></div>" ;
            print "<div id='dni_art' data-id='".$dni_arti."'></div>" ;
            print "<div id='articulo_seleccionado' data-id='".$articulo_seleccionado."'></div>" ;
            print "<div id='cantidad' data-id='".$cantidad."'></div>" ;
        } else {
            print "<br>ID: ".$dni_arti = null ;
            print "<br>Articulo: ".$articulo_seleccionado ;
            print "<br>Carrito: ".$cantidad = 0 ;
            print "<br>Enviando..." ;
            print "<div id='exist' data-id='0'></div>" ;
            print "<div id='dni_art' data-id='".$dni_arti."'></div>" ;
            print "<div id='articulo_seleccionado' data-id='".$articulo_seleccionado."'></div>" ;
            print "<div id='cantidad' data-id='".$cantidad."'></div>" ;
        }
        
        
    }
    
    ?>
    <script src="http://localhost/public/js/transaccion.js"></script>