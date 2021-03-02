<?php
    //require_once ("./getters/getArticulo.php") ;
    $articulocontroller = new ArticuloController () ;
    $articulo ;
    $ar = "" ;
    $getarticulo = $articulocontroller->getArticulo ($articulo = $ar) ;
    $countarticulo = count ($getarticulo) ;
?>