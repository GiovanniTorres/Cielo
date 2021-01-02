<?php
require "Connection.php" ;
class ClienteModel extends Connection {
    public function set ($cliente_data = array ()) {
        foreach ($cliente_data as $key => $value) {
            $$key = $value ;
        }
        $this->query = "REPLACE INTO clientes (clienteDNI, adminDNI, cl_nombre, cl_apellidos, cl_usuario, cl_password, cl_edad, cl_rfc, cl_telefono, cl_mail, cl_direccion, cl_cp, cl_sello_digital, cl_razon_social, cl_mensaje) 
                                       VALUES ('$clienteDNI', '$adminDNI', '$cl_nombre', '$cl_apellidos', '$cl_usuario', '$cl_password', '$cl_edad', '$cl_rfc', '$cl_telefono', '$cl_mail', '$cl_direccion', '$cl_cp', '$cl_sello_digital', '$cl_razon_social', '$cl_mensaje') " ;
        $this->set_query () ;                                       
    }

    public function get ($cliente = "") {
        $this->query = ($cliente != "") ? "SELECT * FROM clientes WHERE clienteDNI = '$cliente'" : "SELECT * FROM clientes" ;
        $this->get_query () ;
        foreach ($this->rows as $key => $value) {
            $data[$key] = $value ;
        }
        return $data ;
    }

}