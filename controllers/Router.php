<?php
class Router {
    public function __construct ($route) {
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
        }
    }

    public function __destruct () {
        unset ($this->route) ;
    }
}