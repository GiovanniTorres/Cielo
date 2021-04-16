<?php
require_once ("../models/VentasModel.php") ;
class VentasController {
    private $ventasmodel ;
    public function __construct () {
        $this->ventasmodel = new VentasModel () ;
    }

    public function getVentas ($venta = "") {
        return $this->ventasmodel->get ($venta = "") ;
    }

    public function getVentasAjax ($venta = "") {
        return $this->ventasmodel->getAjax ($venta = "") ;
    }

    public function setVentas ($venta_data) {
        return $this->ventasmodel->set ($venta_data) ;
    }

    public function __destruct () {
        unset ($this->ventasmodel) ;
    }
}