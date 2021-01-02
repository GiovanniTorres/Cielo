<?php
require "Connection.php" ;
class AdminModel extends Connection {
    public function get ($admin = "") {
        $this->query = ($admin != "") ? "SELECT * FROM administradores WHERE adminDNI = '$admin'" : "SELECT * FROM administradores" ;
        $this->get_query () ;
        foreach ($this->rows as $key => $value) {
            $data[$key] = $value ;
        }
        return $data ;
    }
}