<?php
require_once ("../models/TransaccionModel.php") ;
class TransaccionController {
    private $transaccionmodel ;
    public function __construct () {
        $this->transaccionmodel = new TransaccionModel () ;
    }
    public function setTransaccion ($transaccion_data) {
        //print $compraajax ;
        return $this->transaccionmodel->set ($transaccion_data) ;
    }
    public function __destruct () {
        unset ($this->transaccionmodel) ;
    }
} 