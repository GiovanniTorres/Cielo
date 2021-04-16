<?php
require_once ($_SERVER['DOCUMENT_ROOT']."/models/CarritoModel.php") ;
class CarritoController {
    private $carritomodel ;
    public function __construct () {
        $this->carritomodel = new CarritoModel () ;
    }

    public function carritoGet ($carrito = "") {
        return $this->carritomodel->get ($carrito = "") ;
    }

    public function carritoGetAjax ($carrito = "") {
        return $this->carritomodel->getAjax ($carrito = "") ;
    }
    
    public function __destruct () {
        unset ($this->carritomodel) ;
    }
}