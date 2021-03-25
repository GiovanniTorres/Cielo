<?php
require_once ("../models/CarritoModelAJAX.php") ;
class CarritoControllerAJAX {
    private $carritomodelajax ;
    public function __construct () {
        return $this->carritomodelajax = new CarritoModelAJAX () ;
    }

    public function carritoGet ($carrito = "") {
        return $this->carritomodelajax->get ($carrito = "") ;
    }
    
    public function __destruct () {
        unset ($this->carritomodel) ;
    }
}