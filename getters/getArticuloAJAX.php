<?php
    require_once ("../controllers/ArticuloControllerAJAX.php") ;
    $articulo ;
    $ar = "" ;
    $articulocontroller = new ArticuloControllerAJAX () ;
    $getarticulo = $articulocontroller->getArticulo ($articulo = $ar) ;
    $countarticulo = count ($getarticulo) ;

    for ($i=1; $i < $countarticulo; $i++) { 
        print $getarticulo [$i]["articuloDNI"] ;
    }
    /*require_once ("../controllers/ArticuloControllerAJAX.php") ;
    $articulocontroller = new ArticuloController () ;
    */
?>