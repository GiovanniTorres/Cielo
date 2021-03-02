<?php
require "Connection.php" ;
class TransaccionModel extends Connection {
    public function set ($transaccion_data = array ()) {
        foreach ($transaccion_data as $key => $value) {
            $$key = $value ;
        }
        $this->query = "REPLACE INTO carrito (carritoDNI, articuloDNI, clienteDNI, ventaDNI, ca_cantidad, ca_precio_cant) 
                                       VALUES ('$carritoDNI', '$articuloDNI', '$clienteDNI', '$ventaDNI', '$ca_cantidad', '$ca_precio_cant') " ;
        $this->set_query () ;                                       
    }

    public function get () {}

    public function del () {}
}