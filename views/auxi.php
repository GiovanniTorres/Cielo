<?php require_once ("./getters/getArticulo.php"); 
$divide = explode ("/", $_GET["r"]) ;

/*Grupo actual de paginas de 7*/
$grupo_actual = $divide [1];
/*Página actual*/
$pagina_actual = $divide[2] ;
/*Obtenemos la canidad de articulos existentes en la BD*/
$num_articulos = $countarticulo + 0 ;
/*Determinar cantidad de articulos visibles por página*/
$articulos_por_pagina = 4 ;
/*Determinamos el número de paginas visibles*/
$paginas_visibles = 7 ;
/*Obtenemos el residuo de la division*/
$residuo = ($num_articulos) % $articulos_por_pagina ;
/*Si no tiene residuo, no hacemos nada, si tenemos residuo restamos un numero, hasta que el residuo sea cero*/

if ($residuo == 0) {
    $restantes = $residuo ;
    $completos = $num_articulos ;
    $paginas = $completos / $articulos_por_pagina ;
    $pagina_adicional = 0 ;
    $art_por_pagina = $completos / ($paginas) ;
    $total_paginas = $paginas + $pagina_adicional ;
} else {
    $i = 0;
    do {
        $residuo = $residuo - 1 ;
        $i = $i + 1 ;
    } while ($residuo != 0);
    $restantes = $i ;
    $completos = $num_articulos - $restantes ;
    $paginas = ($completos / $articulos_por_pagina) ;
    $pagina_adicional = 1 ;
    $art_por_pagina = $completos / ($paginas) ;
    $total_paginas = $paginas + $pagina_adicional ;
}

$fin_grupo = ($art_por_pagina * $pagina_actual) - 0 ;
$inicio_grupo = $fin_grupo - ($art_por_pagina - 1) ;
if ($pagina_actual > $paginas) {
    $fin_grupo = $num_articulos ;
    $inicio_grupo = $fin_grupo ;
}


/*
if ($pagina_actual <= $paginas_visibles) {
    print "menor a 7" ;
    $menos = $paginas_visibles - $total_paginas ;
    $pagina_final = $paginas_visibles - $menos ;
    $pagina_inicial = 1 ;
    $residuo_pag = 0 ;
} else {
    print "mayor a 7" ;    
    $residuo_pag = $total_paginas % $paginas_visibles ;
    
    $pi = 0 ;
    do {
        $residuo_pag = $residuo_pag - 1 ;
        $pi = $pi + 1 ;
    } while ($residuo_pag != 0);
    $pagina_final = $paginas_visibles * $grupo_actual ;//////////////////
    $pagina_inicial = $pagina_final - 6 ;
    $paginas_restantes = $pi ;
    $paginas_7 = $total_paginas - $paginas_restantes ;
    $grupos_de_7 = $paginas_7 / $paginas_visibles ;
    //$grupo_actual = 1 ;
}
*/
if ($total_paginas <= $paginas_visibles) {
    print "menor a 7" ;
    $residuo_pag = 0 ;
    $espacios_vacios = $paginas_visibles - $total_paginas ;
    $pagina_final = $paginas_visibles - $espacios_vacios ;
    $pagina_inicial = 1 ;
} else {
    print "mayor a 7" ;
    
}

print "<br>Total de articulos: ".$num_articulos ;
print "<br>Articulos por página: ".$art_por_pagina ;
print "<br>Árticuloas completas: ".$completos ;
print "<br>Árticuloas Restantes: ".$restantes ;
print "<br>Páginas llenas: ".$paginas ;
print "<br>Página adicional: ".$pagina_adicional ;
print "<br>Total de páginas: ".$total_paginas ;
print "<br>Pagina actual: ".$pagina_actual ;
print "<br>Inicio grupo: ".$inicio_grupo ;
print "<br>Fin grupo: ".$fin_grupo ;

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
                            <?php for ($l=$inicio_grupo-1 ; $l <= $fin_grupo-1 ; $l++) { ?>
                                <div class="col-md-4 borde borde-danger nopaddin borde border-primary p-1">
                                    <div class="border-4 rounded p-0">
                                        <div class="card-header text-center bg-4 small">
                                            <?php print $getarticulo [$l]["ar_nombre"] . $l ; ?>
                                        </div> 
                                        <div class="card-body p-2">
                                            <?php print "<img src=http://localhost".$getarticulo[$l]['ar_imagen'].".jpg class='imagen'>" ; ?>    
                                        </div>
                                        <div class="card-body p-1 text-center">
                                            <h5>$200.00 MXN</h5>
                                        </div>
                                        <div class="p-2">
                                        <a href="tienda/detalles/<?php print $l ?>" class="col-md-12 btn btn-light border border-primary text-primary">Ver</a>
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
                                    <td class="text-center"><img src="http://localhost/imagenes/imagen1.jpg" width="35px"></td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">1</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center"><img src="http://localhost/imagenes/imagen1.jpg" width="35px"></td>
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
                    <span><</span>


                    <?php for ($j=$pagina_inicial; $j < $pagina_final + 1 ; $j++) { ?>
                        <span class="p-1"> <a href="http://localhost/tienda/<?php print $grupo_actual."/". $j ?>" class="text-light"><?php print $j ?></a> </span>
                    <?php } ?>

                    <span> <a href="http://localhost/tienda/<?php print ($grupo_actual+1)."/". ($paginas_visibles + 1) ?>" class="text-light"> > </span>
                </div>
            </div>
        </div>
    </div>
</div><br>