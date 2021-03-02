<?php
class SessionController {
	private $session;

	public function __construct () {
		$this->session = new UserModel () ;
	}

	public function login ($usuario, $contrasena) {
		return $this->session->validate_user($usuario, $contrasena);
	}

	public function logout () {
		session_start();
		session_destroy();
		header('Location: ./');
	}	

	public function __destruct () {
		unset($this->session);
	}
}