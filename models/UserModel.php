<?php
require "Connection.php" ;
class UserModel extends Connection {
	public function set ($user_data = array()) {
		foreach ($user_data as $key => $value) {
			$$key = $value;
		}
		$this->query = "
		REPLACE INTO users (mail, name, user, password, telephone)
		VALUES ('$mail', '$name', '$user', '$password', '$telephone')";
		$this->set_query();
	}

	public function get ($user = "") {
		$this->query = ($user != "") ? "SELECT * FROM users WHERE user = '$user'" 
									 : "SELECT * FROM users" ;
		$this->get_query () ;

		foreach ($this->rows as $key => $value) {
			$data[$key] = $value ;
		}
		return $data ;
	}		

	public function del () {}

	public function validate_user ($usuario, $contrasena) {
		$this->query = "SELECT * FROM clientes WHERE cl_usuario = '$usuario' AND cl_password = '$contrasena'" ;
		$this->get_query () ;
		$data = array () ;
		foreach ($this->rows as $key => $value) {
			$data[$key] = $value ;
		}
		return $data ;
	}	
}