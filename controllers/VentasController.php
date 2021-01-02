<?php
class VentasController {
    private $ventasmodel ;
    public function __construct () {
        $this->ventasmodel = new VentasModel () ;
    }
    public function getVentas ($venta = "") {
        return $this->ventasmodel->get ($venta = "") ;
    }
    public function __destruct () {
        unset ($this->ventasmodel) ;
    }
}