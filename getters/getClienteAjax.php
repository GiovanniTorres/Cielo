<?php
$cliente = "" ;
$c = "" ;
$clientecontroller = new ClienteController () ;
$getcliente = $clientecontroller->getCliente ($cliente = $c) ;
$countcliente = count ($getcliente) ;

print $getcliente [0] ['clienteDNI'] ;