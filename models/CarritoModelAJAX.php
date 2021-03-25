<?php
require "Connection.php" ;
class CarritoModelAJAX extends Connection {
    public function get ($carrito = "") {
        //$this->query = ($carrito != "") ? "SELECT * FROM carrito WHERE carritoDNI = '$carrito'" : "SELECT * FROM carrito" ;
        /*$this->query = "SELECT articulos.ar_nombre, carrito.carritoDNI, clientes.cl_nombre FROM carrito 
                                           INNER JOIN articulos
                                           ON carrito.articuloDNI = articulos.articuloDNI 
                                           INNER JOIN clientes
                                           ON carrito.clienteDNI = clientes.clienteDNI" ;*/
        $this->query = "SELECT * FROM carrito
                                 INNER JOIN articulos ON carrito.articuloDNI = articulos.articuloDNI
                                 INNER JOIN clientes ON carrito.clienteDNI = clientes.clienteDNI" ;
        $this->get_query () ;
        foreach ($this->rows as $key => $value) {
            $data[$key] = $value ;
        }
        return $data ;
    }
}