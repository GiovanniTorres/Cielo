<?php
class Router {
    public function __construct ($route) {
        if (!isset ($_SESSION)) session_start () ;
        if (!isset ($_SESSION ['i']) ) $_SESSION ['i'] = false ;
        $viewscontroller = new ViewsController () ;
        $divide = explode ("/", $route) ;

        if (isset ($divide [4])) {
            if ($divide [4] == "detalles") {
                $viewscontroller->view ("/detalles") ;
            } 
        } elseif ($divide [0] == "home") {
            $viewscontroller->view ($route) ;
        } elseif ($divide [0] == "tienda") {
            $viewscontroller->view ("tienda") ;
        } elseif ($divide [0] == "cliente") {
            $viewscontroller->view ($route) ;
        } elseif ($divide [0] == "iniciar_sesion") {
            require_once ("./views/iniciar_sesion.php") ;
        } elseif ($divide[0] == "exit") {
			$user_session = new SessionController () ;
			$session = $user_session->logout();
		}
    }

    public function __destruct () {
        unset ($this->route) ;
    }
}