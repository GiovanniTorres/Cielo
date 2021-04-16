<?php
require "Connection.php" ;
class VentasModel extends Connection {
    public function get ($venta = "") {
        $this->query = ($venta != "") ? "SELECT * FROM ventas WHERE ventaDNI = '$venta'" : "SELECT * FROM ventas" ;
        $this->get_query () ;
        foreach ($this->rows as $key => $value) {
            $data[$key] = $value ;
        }
        return $data ;
    }

    public function getAjax ($venta = "") {
        $this->query = "SELECT * FROM ventas
                                 INNER JOIN clientes ON ventas.clienteDNI = clientes.clienteDNI" ;
        $this->get_query () ;
        foreach ($this->rows as $key => $value) {
            $data[$key] = $value ;
        }
        return $data ;
    }

    public function set ($venta_data = array ()) {
        foreach ($venta_data as $key => $value) {
            $$key = $value ;
        }
        $this->query = "REPLACE INTO ventas (ventaDNI, clienteDNI, adminDNI, ve_fecha_hora, ve_total, ve_statpaq) 
                                       VALUES ('$ventaDNI', '$clienteDNI', '$adminDNI', '$ve_fecha_hora', '$ve_total', '$ve_statpaq') " ;
        $this->set_query () ;   
    }
}