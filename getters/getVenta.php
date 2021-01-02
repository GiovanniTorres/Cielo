<?php
$venta = "" ;
$v = "" ;
$ventascontroller = new VentasController () ;
$getventa = $ventascontroller->getventas ($venta = $v) ;
$countventa = count ($getventa) ;
//print $getventa [0] ["ventaDNI"] ;