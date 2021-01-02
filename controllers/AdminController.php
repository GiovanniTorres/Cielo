<?php
class AdminController {
    private $adminmodel ;
    public function __construct () {
        $this->adminmodel = new AdminModel () ;
    }
    public function getAdmin ($admin = "") {
        return $this->adminmodel->get ($admin = "") ;
    }
    public function __destruct () {
        unset ($this->adminmodel) ;
    }
}