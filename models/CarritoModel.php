<?php
require "Connection.php" ;
class CarritoModel extends Connection {
    public function get ($carrito = "") {
        $this->query = ($carrito != "") ? "SELECT * FROM carrito WHERE carritoDNI = '$carrito'" : "SELECT * FROM carrito" ;
        $this->get_query () ;
        foreach ($this->rows as $key => $value) {
            $data[$key] = $value ;
        }
        return $data ;
    }

    public function getAjax ($carrito = "") {
        $this->query = "SELECT * FROM carrito
                                 INNER JOIN articulos ON carrito.articuloDNI = articulos.articuloDNI
                                 INNER JOIN ventas ON carrito.ventaDNI = ventas.ventaDNI" ;
        $this->get_query () ;
        foreach ($this->rows as $key => $value) {
            $data[$key] = $value ;
        }
        return $data ;
    }

    public function set () {}
}