<?php require_once ("./getters/getArticulo.php"); 
/*Obtenemos la canidad de articulos existentes en la BD*/
$countarticulo;
print $num_articulos = $countarticulo + 5 ;
/*Determinar cantidad de paginas visibles*/
$visible_page = 6 ;
/*Obtenemos el residuo de la division*/
$residuo = ($num_articulos) % $visible_page ;
//$i = 0;
/*Si no tiene residuo, no hacemos nada, si tenemos residuo restamos un numero, hasta que el residuo sea cero*/
if ($residuo == 0) {
    print "<br>Restantes: ".$residuo = $residuo ;
} else {
    $i = 0;
    do {
        $residuo = $residuo - 1 ;
        $i = $i + 1 ;
    } while ($residuo != 0);
    print "<br>Restantes: ".$r = $i ;
    print "<br>Completos: ".$completos = $num_articulos - $r ;
}


/*if ($residuo == 0) {
    $residuo = $residuo ;
} else {
    do {
        $residuo = $residuo - 1 ;
        $i = $i + 1 ;
    } while ($residuo != 0);
    print "<br>Intentos:".$r = $i ;
}
*/
?>

<div class="container borde">
    <div class="row p-4 text-1">
            <h5>Tienda en Linea</h5>
    </div>
</div>

<div class="container borde">
    <div class="row">
        <div class="p-1 col-md-12">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 p-2">
                    <div class="container">
                        <div class="row">
                            <?php for ($i=0; $i < $countarticulo ; $i++) { ?>
                                <div class="col-md-4 borde borde-danger nopaddin borde border-primary p-1">
                                    <div class="border-4 rounded p-0">
                                        <div class="card-header text-center bg-4 small">
                                            <?php print $getarticulo [$i]["ar_nombre"] ; ?>
                                        </div> 
                                        <div class="card-body p-2">
                                            <?php print "<img src=".$getarticulo[$i]['ar_imagen'].".jpg class='imagen'>" ; ?>    
                                        </div>
                                        <div class="card-body p-1 text-center">
                                            <h5>$200.00 MXN</h5>
                                        </div>
                                        <div class="p-2">
                                        <a href="tienda/detalles/<?php print $i ?>" class="col-md-12 btn btn-light border border-primary text-primary">Ver</a>
                                        </div>
                                        <div class="p-2">
                                        <a href="#" class="col-md-12 btn btn-primary">Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 bg-0 p-2">
                        <div id="carrito" class="border rounded">
						<table id="lista-carrito">
							<thead>
								<tr class="trhead">
									<th class="trListaCart text-center" width="30%">Id</th>
									<th class="trListaCart text-center" width="30%">Imagen</th>
									<th class="trListaCart text-center" width="30%">Nombre</th>
									<th class="trListaCart text-center" width="30%">Precio</th>
								</tr>
							</thead>
							<tbody>
								<tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center"><img src="./imagenes/imagen1.jpg" width="35px"></td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">1</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center"><img src="./imagenes/imagen1.jpg" width="35px"></td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">1</td>
                                </tr>
							</tbody>
						</table>	
					</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row bg-1 justify-content-center">
                <div class="col-md-8 text-center text-light p-1">
                    Páginas:
                </div>
                <div class="col-md-8 text-center text-light p-1">
                    <span>1</span>
                    <span>2</span>
                </div>
            </div>
        </div>
    </div>
</div><br>