<?php
class ClienteController {
    private $clientemodel ;
    public function __construct () {
        $this->clientemodel = new ClienteModel () ;
    }

    public function getCliente ($cliente = "") {
        return $this->clientemodel->get ($cliente = "") ;
    }

    public function setCliente ($cliente_data) {
        return $this->clientemodel->set ($cliente_data) ;
    }

    public function __destruct () {
        unset ($this->clientemodel) ;
    }
}