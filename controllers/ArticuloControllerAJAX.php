<?php
require_once ("../models/ArticuloModelAJAX.php") ;
class ArticuloControllerAJAX {
    private $articulomodelajax ;
    public function __construct () {
        return $this->articulomodelajax = new ArticuloModelAJAX () ;
    }

    public function getArticulo ($articulo) {
        return $this->articulomodelajax->get ($articulo) ;
    }

    public function __destruct () {}
}