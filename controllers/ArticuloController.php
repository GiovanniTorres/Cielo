<?php
class ArticuloController {
    private $articulomodel ;
    public function __construct () {
        return $this->articulomodel = new articuloModel () ;
    }

    public function getArticulo ($articulo) {
        return $this->articulomodel->get ($articulo) ;
    }

    public function __destruct () {}
}