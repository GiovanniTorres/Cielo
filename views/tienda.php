<?php require_once ("./getters/getArticulo.php"); 
$divide = explode ("/", $_GET["r"]) ;

/*Grupo actual de paginas_llenas de 7*/
$grupo_actual = $divide [1];
/*Página actual*/
$pagina_actual = $divide[2] ;
/*Obtenemos la canidad de articulos existentes en la BD*/
$total_de_articulos = $countarticulo + 0 ;
/*Determinar cantidad de articulos visibles por página*/
$articulos_por_pagina = 6 ;
/*Determinamos el número de paginas_llenas visibles*/
$paginas_visibles = 7 ;
/*Obtenemos el residuo de la division*/
$residuo = ($total_de_articulos) % $articulos_por_pagina ;
/*Si no tiene residuo, no hacemos nada, si tenemos residuo restamos un numero, hasta que el residuo sea cero*/

if ($residuo == 0) { //No existen páginas adicionales
    $restantes = $residuo ;//No hay restantes
    $pagina_adicional = 0 ;//Por tanto, no hay paginas adicionales
    $articulos_en_paquetes = $total_de_articulos ; //Solo hay paquetes completos
    $paginas_llenas = $total_de_articulos / $articulos_por_pagina ;
    $art_por_pagina = $total_de_articulos / ($paginas_llenas) ;
    $total_paginas = $paginas_llenas + $pagina_adicional ;
} else { //Si existen páginas adicionales
    $i = 0 ;
    do {
        $residuo = $residuo - 1 ; //Eliminamos articulos hasta que encontremos un numero divisible entre el número de paginas visibles
        $i = $i + 1 ;//Cuenta los elementos quitados hasta encontrar un número divisible entre el numero de paginas visibles
    } while ($residuo != 0);//Repetir hasta que el residuo sea cero
    $restantes = $i ;//Los elementos quitados son la cantidad de elementos restantes
    $articulos_en_paquetes = $total_de_articulos - $restantes ;
    $paginas_llenas = ($articulos_en_paquetes / $articulos_por_pagina) ;
    $pagina_adicional = 1 ;//Se agrega pagina incompleta
    $art_por_pagina = $articulos_en_paquetes / ($paginas_llenas) ;
    $total_paginas = $paginas_llenas + $pagina_adicional ;//Total de paginas necesarias
}
/*Determinamos el grupo de elementos en el que nos encontramos y establecemos los que corresponden a esta págna*/
    $elemento_final = ($art_por_pagina * $pagina_actual) ;
    $elemento_inicial = $elemento_final - ($art_por_pagina - 1) ;
/*Agrupamos los articulos restantes, estableciendo el elemento final y el inicial*/
if ($pagina_actual > $paginas_llenas) {
    $elemento_final = $total_de_articulos ;
    $diferencia = $elemento_final-$articulos_en_paquetes ;
    $elemento_inicial = $elemento_final-($diferencia - 1) ;
}

/*Paginación */

/*Establecemos la cantidad de paginas que necesitamos*/
if ($total_paginas <= $paginas_visibles) {/*Si la cantidad de paginas necesarias es menor o igual a las paginas visibles*/
    $pagina_final = $total_paginas ;/*Pagina final es igual al total de paginas*/
    $pagina_inicial = 1 ;
    $grupo_pag_llenas = 1 ;
    $x = 0 ;
}

if ($total_paginas > $paginas_visibles) {
    $residuo_pag = $total_paginas % $paginas_visibles ;
    $x = 0 ;
    do {
        $residuo_pag  = $residuo_pag - 1 ;
        $x = $x + 1 ;
    } while ($residuo_pag != 0);
    $llenas_menos_restantes = $total_paginas - $x ;
    $grupo_pag_llenas = $llenas_menos_restantes / $paginas_visibles ;

    if ($grupo_actual > $grupo_pag_llenas) {
        $pagina_final = $total_paginas - $x ;
    }

    $pagina_final = $grupo_actual * $paginas_visibles ;
    $pagina_inicial = $pagina_final - 6 ;
    
    if ($grupo_actual > $grupo_pag_llenas) {
        $pagina_final = ($pagina_final - $x) - 1 ;
    }
}


/**Infrmación sobre articulos por página*/
print "<br>Total de articulos: ".$total_de_articulos ;
print "<br>Articulos por página: ".$art_por_pagina ;
print "<br>Árticuloas completas: ".$articulos_en_paquetes ;
print "<br>Árticuloas Restantes: ".$restantes ;
print "<br>Páginas llenas: ".$paginas_llenas ;
print "<br>Página adicional: ".$pagina_adicional ;
print "<br>Total de páginas: ".$total_paginas ;
print "<br>Pagina actual: ".$pagina_actual ;
print "<br>Elemento inicial: ".$elemento_inicial ;
print "<br>Elemento final: ".$elemento_final ;

print "<br><br>Grupo de paginas llenas: ".$grupo_pag_llenas ;
print "<br>Páginas restantes: ".$x ;
print "<br>Página final: ".$pagina_final ;
print "<br>Página inicial: ".$pagina_inicial ;
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
                            <?php for ($l=$elemento_inicial-1 ; $l <= $elemento_final-1 ; $l++) { ?>
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