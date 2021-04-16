<?php
require ("Connection.php") ;
class ArticuloModel extends Connection {
    public function get ($articulo = "") {
        $this->query = ($articulo != "") ? "SELECT * FROM articulos WHERE ar_nombre = '$articulo'" : "SELECT * FROM articulos" ;
        $this->get_query () ;
        foreach ($this->rows as $key => $value) {
            $data[$key] = $value ;
        }
        return $data ;
    }

    public function set () {}
}