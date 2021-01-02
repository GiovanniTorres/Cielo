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
}