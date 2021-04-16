<div class="container border">
    <div class="row">
        <div class="col-md-12 border p-2">
            <div class="col-md-12 border p-2">

                <table width="100%" >
                    <thead>
                        <tr>
                            <th width="1%" class="bg-4 first_tr xx_small text-center py-2">#</th>
                            <th width="1%" class="bg-4 xx_small text-center py-2">Imagen</th>
                            <th width="1%" th class="bg-4 xx_small text-center py-2">Articulo</th>
                            <th width="1%" class="bg-4 xx_small text-center py-2">Cant.</th>
                            <th width="1%" class="bg-4 xx_small text-center py-2">Precio</th>
                        </tr>
                    </thead>
                    <tbody id="disp">
                        <?php
                            require_once ($_SERVER['DOCUMENT_ROOT']."/controllers/CarritoController.php") ;
                            $carrito = "" ;
                            $car = "" ;

                            $carritocontroller = new CarritoController () ;
                            $getCarrito = $carritocontroller->carritoGetAjax ($carrito = $car) ;
                            $countcarrito = count ($getCarrito) ;
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
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>