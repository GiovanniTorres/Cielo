<?php
class Router {
    public function __construct ($route) {
        $viewscontroller = new ViewsController () ;
        $divide = explode ("/", $route) ;

        if (isset ($divide [1])) {
            if ($divide [1] == "detalles") {
                $viewscontroller->view ("/detalles") ;
            } 
        } elseif ($divide [0] == "home") {
            $viewscontroller->view ($route) ;
        } elseif ($divide [0] == "tienda") {
            $viewscontroller->view ($route) ;
        } elseif ($divide [0] == "cliente") {
            $viewscontroller->view ($route) ;
        }
    }

    public function __destruct () {
        unset ($this->route) ;
    }
}