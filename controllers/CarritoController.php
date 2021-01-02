<?php
class CarritoController {
    private $carritomodel ;
    public function __construct () {
        $this->carritomodel = new CarritoModel () ;
    }

    public function carritoGet ($carrito = "") {
        return $this->carritomodel->get ($carrito = "") ;
    }
    
    public function __destruct () {
        unset ($this->carritomodel) ;
    }
}