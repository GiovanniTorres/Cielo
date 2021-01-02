<?php
abstract class Connection {
    private static $database_host = "localhost" ;
    private static $database_user = "root" ;
    private static $database_pass = "" ;
    private static $database_name = "cielo" ;
    private static $database_char = "utf8" ;
    private $connected ;
    protected $query ;
    protected $rows = array () ;

    abstract protected function get () ;

    private function open_database () {
        $this->connected = new mysqli (
            self::$database_host ,
            self::$database_user ,
            self::$database_pass ,
            self::$database_name
        ) ;
        $this->connected->set_charset (
            self::$database_char
        ) ;
    }
    private function close_database () {
        $this->connected->close () ;
    }
    protected function set_query () {
        $this->open_database () ;
        $this->connected->query ($this->query) ;
        $this->close_database () ;
    }
    protected function get_query () {
        $this->open_database () ;
        $result = $this->connected->query ($this->query) ;
        while ($this->rows[] = $result->fetch_assoc ()) ;
        $result->close () ;
        $this->close_database () ;
        return array_pop ($this->rows) ;
    }
}