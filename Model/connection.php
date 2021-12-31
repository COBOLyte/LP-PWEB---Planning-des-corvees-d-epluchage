<?php
class Connection {
    private $host;
    private $login;
    private $pwd;
    private $db;
    
    public function __construct() {
        //$this->host = "";
        //$this->login = "";
        //$this->pwd = "";
        
        try {            
            $this->db = new MongoDB\Client("mongodb://localhost:27017");
        } catch (MongoDB\Driver\Exception\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getDb() { return $this->db; }
}
?>
